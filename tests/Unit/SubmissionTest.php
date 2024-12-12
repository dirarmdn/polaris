<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reviewer;
use App\Models\Submitter;
use App\Models\Submission;
use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;   
/**
     * Test searching and filtering submissions by title.
     *
     * @return void
     */
    public function test_search_returns_filtered_submission()
    {
        // Arrange: Membuat data yang diperlukan
        $organization = Organization::create([
            'organization_code' => 'POL1234',
            'organization_name' => 'Politeknik Negeri Bandung'
        ]);

        $user = User::create([
            'name' => 'Miya Soraya',
            'email' => 'miya@smartek.com',
            'password' => bcrypt('password123')
        ]);

        $submitter = Submitter::create([
            'user_id' => $user->user_id,
            'position_in_organization' => 'Pegawai',
            'organization_code' => 'POL1234'
        ]);

        // Membuat Submission yang akan diuji
        $submission1 = Submission::factory()->create([
            'submitter_id' => $submitter->submitter_id,
            'status' => 'terverifikasi',
            'submission_title' => 'Test Judul',
            'platform' => 'web',
            'project_type' => false,  // Baru
        ]);

        $submission2 = Submission::factory()->create([
            'submitter_id' => $submitter->submitter_id,
            'status' => 'terverifikasi',
            'submission_title' => 'Another Judul',
            'platform' => 'mobile',
            'project_type' => false,  // Baru
        ]);

        // Act: Mengirim request GET ke route yang menangani pencarian dengan filter tambahan
        $response = $this->get(route('submissions.search', [
            'search' => 'Test', 
            'organization' => 'POL1234',
            'platform' => ['web'],    // Filter platform
            'existing_app' => false,  // Filter existing_app (aplikasi baru)
            'sort_by' => 'submission_title',  // Sorting berdasarkan judul
            'sort_direction' => 'asc',
            'perPage' => 10,  // Pagination (jumlah per halaman)
        ]));

        // Assert: Memastikan response sesuai harapan
        $response->assertStatus(200);
        $response->assertSee($submission1->submission_title);  // Harus melihat "Test Judul"
        $response->assertDontSee($submission2->submission_title);  // Tidak melihat "Another Judul"
    }

    public function test_user_cannot_login_if_email_is_not_verified()
    {
        // Arrange: Membuat user dengan email yang belum terverifikasi
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'), // Password terenkripsi
        ]);

        // Act: Mengirimkan request login dengan kredensial yang benar
        $response = $this->post(route('login.post'), [
            'email' => 'testuser@example.com',
            'password' => 'password123',
        ]);

        // Assert: Memastikan bahwa session error dengan pesan yang benar muncul
        $response->assertSessionHas('errors');
        $this->assertTrue(session()->has('errors')); 
        $this->assertEquals('Your email address is not verified.', session('errors')->get('email')[0]);
    }

    public function test_store_creates_new_submission()
    {
        $organization = Organization::create([
            'organization_code' => 'POL1234',
            'organization_name' => 'Politeknik Negeri Bandung'
        ]);

        // Ambil Submitter dengan ID 1
        $user = User::create([
            'name' => 'Miya Soraya',
            'email' => 'miya@smartek.com',
            'password' => bcrypt('password123')
        ]);

        $submitter = Submitter::create([
            'user_id' => $user->user_id,
            'position_in_organization' => 'Pegawai',
            'organization_code' => $organization->organization_code
        ]);

        // Pastikan Submitter ditemukan
        $this->assertNotNull($submitter, 'Submitter not found!');

        // Pastikan pengguna ditemukan
        $this->assertNotNull($user, 'User not found!');

        // Login sebagai pengguna tersebut menggunakan email dan password
        $this->actingAs($user);

        $data = [
            'submitter_id' => $submitter->submitter_id,
            'status' =>'belum_direview',
            'submission_title' => 'Sistem Pengajuan Proposal Aplikasi',
            'problem_description' => 'Proses pengajuan aplikasi manual memakan waktu lama',
            'application_purpose' => 'Mempermudah pengajuan proposal aplikasi',
            'business_process' => 'Pengajuan, Review, Persetujuan',
            'business_rules' => 'Batas waktu review maksimal 7 hari kerja',
            'platform' => 'web',
            'stakeholders' => 'Mahasiswa, Dosen, Reviewer',
            'project_type' => true,
            'reference' => [
                'description' => 'Dokumen Referensi Proposal',
                'type' => 'PDF',
                'path' => 'path/to/referensi.pdf'
            ]
        ];

        // Act: Mengakses route store
        $response = $this->post(route('submissions.store'), $data);

        $response->assertSessionHasNoErrors();

        // Assert: Memastikan Submission baru berhasil disimpan
        $response->assertRedirect(route('dashboard.submissions.index'));
        $this->assertDatabaseHas('submissions', [
            'submitter_id' => $submitter->submitter_id,
            'submission_title' => 'Sistem Pengajuan Proposal Aplikasi'
        ]);
    }
}