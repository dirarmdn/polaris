<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test registrasi dengan email selain email organisasi (contohnya gmail.com)
     *
     * @return void
     */
    public function test_register_with_non_organization_email()
    {
        // Mengirimkan request dengan email yang termasuk domain yang diblokir
        $response = $this->post('/register/user', [
            'name' => 'Test User',
            'email' => 'testuser@gmail.com', // Gmail adalah domain yang diblokir
            'position' => 'Manager',
            'organization_name' => 'Test Organization',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => true,
        ]);

        // Mengecek jika response redirect kembali dengan error
        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test registrasi dengan mengosongkan salah satu kolom
     *
     * @return void
     */
    public function test_register_with_missing_fields()
    {
        // Mengirimkan request dengan field kosong (misalnya nama kosong)
        $response = $this->post('/register/user', [
            'name' => '', // Nama kosong
            'email' => 'testuser@company.com',
            'position' => 'Manager',
            'organization_name' => 'Test Organization',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => true,
        ]);

        // Mengecek jika response redirect kembali dengan error pada field 'name'
        $response->assertRedirect();
        $response->assertSessionHasErrors('name');
    }

    /**
     * Test registrasi dengan data valid
     *
     * @return void
     */
    public function test_register_with_valid_data()
    {
        // Mengirimkan request dengan data valid
        $response = $this->post('/register/user', [
            'name' => 'Valid User',
            'email' => 'validuser@company.com',
            'position' => 'Manager',
            'organization_name' => 'Test Organization',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => true,
        ]);

        // Mengecek jika registrasi berhasil dengan redirect ke halaman verifikasi
        $response->assertRedirect(route('verification.notice'));
        $this->assertDatabaseHas('users', ['email' => 'validuser@company.com']);
        $this->assertDatabaseHas('organizations', ['organization_name' => 'Test Organization']);
    }
}
