<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Reviewer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreAdminRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateAdminRequest;
use App\Notifications\AdminAccountDetail;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        // Retrieve the search input from the request
        $nama = $request->input('name'); // Get the search query for 'nama'

        // Query for users with roles 1 or 2 and apply search and pagination
        $admins = User::whereIn('role', [2, 3])
            ->when($nama, function ($query) use ($nama) {
                return $query->where('name', 'LIKE', '%' . $nama . '%');
            })
            ->with('admin')
            ->paginate(10);

        // Pass data to the view
        return view('dashboard.admins.index', compact('admins', 'nama'));
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }
    
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();

        $generatedPassword = Str::random(10);
    
        DB::beginTransaction();
    
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($generatedPassword),
                'role' => $data['role'],
            ]);
    
            if ($data['role'] == 2) {
                Admin::create([
                    'user_id' => $user->user_id,
                    'nip' => $data['nip'],
                ]);
            } else {
                Reviewer::create([
                    'user_id' => $user->user_id,
                    'nip_reviewer' => $data['nip'],
                    'isActive' => true,
                    'review_total' => 0
                ]);
            }
    
            DB::commit();

            Notification::route('mail', $data['email'])->notify(new AdminAccountDetail($data['name'], $generatedPassword));
    
            Alert::success('Berhasil', 'Admin baru berhasil diperbaharui!');
    
            return redirect()->route('admin.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
    
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    

    public function edit($id)
    {
        $admin = User::with('admin')->findOrFail($id);
        return view('dashboard.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::find($id);
        $user->update($data);

        Alert::success('Berhasil', 'Data Admin berhasil diperbaharui!');

        return redirect()->route('admin.index', $id);
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);

        return view('dashboard.admins.show', compact('admin'));
    }
}
