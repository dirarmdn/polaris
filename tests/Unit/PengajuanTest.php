<?php

namespace Tests\Feature;

use App\Models\Pengajuan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PengajuanTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_pengajuan()
    {
        // Arrange: Membuat 10 data pengajuan
        $pengajuan = Pengajuan::factory()->count(10)->create();
    
        // Act: Mengakses route index
        $response = $this->get(route('submissions.index'));
    
        // Assert: Memastikan response yang benar
        $response->assertStatus(200);
        $response->assertViewIs('submissions.index');
        $response->assertViewHas('pengajuan', function ($value) use ($pengajuan) {
            return $value instanceof \Illuminate\Pagination\LengthAwarePaginator; // Expect LengthAwarePaginator
        });
    }
    

    public function test_search_returns_filtered_pengajuan()
    {
        // Arrange: Membuat pengajuan untuk dicari
        $pengajuan = Pengajuan::factory()->create(['judul_pengajuan' => 'Test Judul']);
        $pengajuan2 = Pengajuan::factory()->create(['judul_pengajuan' => 'Another Judul']);

        // Act: Mengakses route search
        $response = $this->get(route('submissions.search', ['search' => 'Test']));

        // Assert: Memastikan hasil pencarian sesuai
        $response->assertStatus(200);
        $response->assertSee($pengajuan->judul_pengajuan);
        $response->assertDontSee($pengajuan2->judul_pengajuan);
    }
    public function test_store_creates_new_pengajuan()
    {
        // Buat organisasi terlebih dahulu
        $organisasi = \App\Models\Organisasi::factory()->create();
    
        // Buat pengaju yang terhubung ke organisasi yang dibuat di atas
        $pengaju = \App\Models\Pengaju::factory()->create([
            'kode_organisasi' => $organisasi->kode_organisasi,
        ]);
    
        $data = [
            'kode_pengajuan' => 'PKG123',
            'id_pengaju' => $pengaju->id_pengaju, // Menghubungkan ke pengaju yang dibuat di atas
            'isVerified' => 1,
            'nama_pengaju' => $pengaju->nama_pengaju,
            'email_pengaju' => $pengaju->email_pengaju,
            'no_telp' => $pengaju->no_telp,
            'jabatan' => $pengaju->jabatan,
            'kode_organisasi' => $pengaju->kode_organisasi,
            'jenis_proyek' => 'Proyek Baru',
            'judul_pengajuan' => 'Pengajuan Baru',
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
    
        // Assert: Memastikan pengajuan baru berhasil disimpan
        $response->assertRedirect(route('submissions.index'));
        $this->assertDatabaseHas('pengajuans', [
            'kode_pengajuan' => 'PKG123',
            'id_pengaju' => $pengaju->id_pengaju,
        ]);
    }    

    public function test_show_displays_pengajuan()
    {
        // Arrange: Membuat data pengajuan untuk ditampilkan
        $pengajuan = \App\Models\Pengajuan::factory()->create();

        // Act: Mengakses route show
        $response = $this->get(route('submissions.show', $pengajuan));
        // dd($response);

        // Assert: Memastikan tampilan pengajuan sesuai
        $response->assertStatus(200);
        $response->assertViewIs('submissions.show');
        // dd($response);
        $response->assertViewHas('pengajuan', $pengajuan);
    }

}