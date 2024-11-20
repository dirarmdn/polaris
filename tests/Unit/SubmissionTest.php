<?php

namespace Tests\Feature;

use App\Models\Submission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_Submission()
    {
        // Arrange: Membuat 10 data Submission
        $Submission = Submission::factory()->count(10)->create();
    
        // Act: Mengakses route index
        $response = $this->get(route('submissions.index'));
    
        // Assert: Memastikan response yang benar
        $response->assertStatus(200);
        $response->assertViewIs('submissions.index');
        $response->assertViewHas('Submission', function ($value) use ($Submission) {
            return $value instanceof \Illuminate\Pagination\LengthAwarePaginator; // Expect LengthAwarePaginator
        });
    }
    

    public function test_search_returns_filtered_Submission()
    {
        // Arrange: Membuat Submission untuk dicari
        $Submission = Submission::factory()->create(['submission_title' => 'Test Judul']);
        $Submission2 = Submission::factory()->create(['submission_title' => 'Another Judul']);

        // Act: Mengakses route search
        $response = $this->get(route('submissions.search', ['search' => 'Test']));

        // Assert: Memastikan hasil pencarian sesuai
        $response->assertStatus(200);
        $response->assertSee($Submission->submission_title);
        $response->assertDontSee($Submission2->submission_title);
    }
    public function test_store_creates_new_Submission()
    {
        // Buat organisasi terlebih dahulu
        $organization = \App\Models\Organization::factory()->create();
    
        // Buat pengaju yang terhubung ke organisasi yang dibuat di atas
        $pengaju = \App\Models\Pengaju::factory()->create([
            'organization_code' => $organization->organization_code,
        ]);
    
        $data = [
            'submission_code' => 'PKG123',
            'id_pengaju' => $pengaju->id_pengaju, // Menghubungkan ke pengaju yang dibuat di atas
            'isVerified' => 1,
            'nama_pengaju' => $pengaju->nama_pengaju,
            'email_pengaju' => $pengaju->email_pengaju,
            'no_telp' => $pengaju->no_telp,
            'jabatan' => $pengaju->jabatan,
            'organization_code' => $pengaju->organization_code,
            'jenis_proyek' => 'Proyek Baru',
            'submission_title' => 'Submission Baru',
            'deskripsi_masalah' => 'Masalah yang dijelaskan.',
            'tujuan_aplikasi' => 'Tujuan aplikasi.',
            'proses_bisnis' => 'Proses bisnis.',
            'aturan_bisnis' => 'Aturan bisnis.',
            'platform' => 'Web',
            'stakeholder' => 'Stakeholder'
        ];
    
        // Act: Mengakses route store
        $response = $this->post(route('dashboard.submissions.store'), $data);
    
        $response->assertSessionHasNoErrors();
    
        // Assert: Memastikan Submission baru berhasil disimpan
        $response->assertRedirect(route('submissions.index'));
        $this->assertDatabaseHas('Submissions', [
            'submission_code' => 'PKG123',
            'id_pengaju' => $pengaju->id_pengaju,
        ]);
    }    

    public function test_show_displays_Submission()
    {
        // Arrange: Membuat data Submission untuk ditampilkan
        $Submission = \App\Models\Submission::factory()->create();

        // Act: Mengakses route show
        $response = $this->get(route('submissions.show', $Submission));
        // dd($response);

        // Assert: Memastikan tampilan Submission sesuai
        $response->assertStatus(200);
        $response->assertViewIs('submissions.show');
        // dd($response);
        $response->assertViewHas('Submission', $Submission);
    }

}