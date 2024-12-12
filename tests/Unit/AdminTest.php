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

class AdminTest extends TestCase
{
    use RefreshDatabase;   

    public function test_review_submission()
    {
        $user = User::factory()->create([
            'role' => 3
        ]);

        $this->actingAs($user);

        $reviewer = Reviewer::create([
            'nip_reviewer' => '1234567890',
            'user_id' => $user->user_id,
            'isActive' => true,
            'review_total' => 0
        ]);

        // Arrange: Buat data Submission
        $submission = Submission::factory()->create([
            'status' => 'belum_direview',
            'review_description' => null,
            'nip_reviewer' => $reviewer->nip_reviewer
        ]);

        // Simulasikan login sebagai user yang telah dibuat

        $reviewData = [
            'status' => 'terverifikasi',
            'review_description' => 'Submission has been reviewed and approved.',
        ];

        // Act: Simulasikan permintaan PATCH ke endpoint untuk mengubah status dan deskripsi
        $response = $this->patch(route('review.update', $submission->submission_code), $reviewData);

        // Assert: Pastikan respons berhasil
        $response->assertStatus(302);

        // Assert: Pastikan data di database diperbarui
        $this->assertDatabaseHas('submissions', [
            'submission_code' => $submission->submission_code,
            'status' => 'terverifikasi',
            'review_description' => 'Submission has been reviewed and approved.',
        ]);
    }

    public function test_store_creates_new_admin()
    {
        // Arrange: Buat user terlebih dahulu
        $user = User::factory()->create([
            'role' => 2
        ]);

        // Simulasikan login sebagai user yang telah dibuat
        $this->actingAs($user);

        // Data admin yang akan ditambahkan
        $data = [
            'name' => 'Asep Sumantri', // Menghubungkan ke user yang sudah dibuat
            'email' => 'mamangkesbor@polaris.com',
            'nip' => '1234567890',  // NIP admin
            'role' => 2
        ];

        // Act: Simulasikan POST request ke route penyimpanan admin
        $response = $this->post(route('admin.store'), $data);

        // Assert: Pastikan respons berhasil
        $response->assertStatus(302); // Redirect setelah penyimpanan
        // $response->assertRedirect(route('admin.index'));
        $response->assertSessionHasNoErrors();

        // Pastikan data admin berhasil tersimpan di database
        $this->assertDatabaseHas('admins', [
            'nip' => '1234567890',
        ]);
    }

    public function test_store_creates_new_reviewer()
    {
        // Arrange: Buat user terlebih dahulu
        $user = User::factory()->create([
            'role' => 2
        ]);

        // Simulasikan login sebagai user yang telah dibuat
        $this->actingAs($user);

        // Data admin yang akan ditambahkan
        $data = [
            'name' => 'Ujank bin Lahab', // Menghubungkan ke user yang sudah dibuat
            'email' => 'ujangbinlahab@polaris.com',
            'nip' => '2234567891', 
            'isActive' => 1,
            'review_total' => 1,
            'role' => 3
        ];

        // Act: Simulasikan POST request ke route penyimpanan admin
        $response = $this->post(route('admin.store'), $data);

        // Assert: Pastikan respons berhasil
        $response->assertStatus(302); // Redirect setelah penyimpanan
        $response->assertRedirect(route('admin.index'));
        $response->assertSessionHasNoErrors();

        // Pastikan data admin berhasil tersimpan di database
        $this->assertDatabaseHas('reviewers', [
            'nip_reviewer' => '2234567891',
        ]);
    }
}