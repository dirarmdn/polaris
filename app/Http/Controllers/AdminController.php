<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //public function index()
    //{
    //  $admins = User::whereIn('role', [1, 2])->paginate(10);
    //return view('dashboard.admins.index', compact('admins'));
    //}
    public function index(Request $request)
    {
        // Retrieve the search input from the request
        $nama = $request->input('nama'); // Get the search query for 'nama'

        // Query for users with roles 1 or 2 and apply search and pagination
        $admins = User::whereIn('role', [2, 3])
            ->when($nama, function ($query) use ($nama) {
                return $query->where('nama', 'LIKE', '%' . $nama . '%');
            })
            ->paginate(10);

        // Pass data to the view
        return view('dashboard.admins.index', compact('admins', 'nama'));
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'no_telp' => 'required|string|max:20',
        ]);

        $roleMap = [
            'admin' => 2,
            'reviewer' => 3,
        ];

        // Validasi role
        if (!array_key_exists($request->input('role'), $roleMap)) {
            return back()
                ->withErrors(['role' => 'Role is not valid.'])
                ->withInput();
        }

    //  untuk penyimpanan
    $data = [
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'kode_organisasi' => 'POL1234',
        'role' => $roleMap[$request->input('role')],
        'jabatan' => 'Civitas Akademika',
        'no_telp' => $request->input('no_telp'),
    ];

        User::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('admin')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        // Ambil data admin berdasarkan ID
        $admin = User::findOrFail($id);
        return view('dashboard.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'role' => 'required|string',
            'no_telp' => 'nullable|string|max:15',
        ]);
        $roleMap = [
            'admin' => 2,
            'reviewer' => 3,
        ];

        // Validasi role
        if (!array_key_exists($request->input('role'), $roleMap)) {
            return back()
                ->withErrors(['role' => 'Role is not valid.'])
                ->withInput();
        }

        // Siapkan data untuk di-update
        $data = [
            'nama' => $validated['name'],
            'email' => $validated['email'],
            'role' => $roleMap[$request->input('role')],
            'no_telp' => $request->input('no_telp'),
        ];

        // Enkripsi password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($validated['password']);
        }

        // Update data  berdasarkan ID
        $user = User::find($id);
        if (!$user) {
            // Jika ID tidak ditemukan
            return redirect()->route('admins.index')->with('error', 'Admin not found.');
        }

        $user->update($data);

        // Redirect ke halaman edit dengan pesan sukses
        //return redirect()->route('admins.edit', $id)->with('success', 'Admin updated successfully.');
    }

    public function show($id)
    {
        $admin = User::where('id', $id)->first();

        return view('dashboard.admins.show', compact('admin'));
    }
}
