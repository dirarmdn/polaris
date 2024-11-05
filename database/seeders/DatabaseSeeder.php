<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pengaju;
use App\Models\Pengajuan;
use App\Models\Referensi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Organisasi;
use App\Models\HasilReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Organisasi::create([
            'kode_organisasi' => 'POL1234',
            'nama' => 'Politeknik Negeri Bandung',
            'deskripsi_perusahaan' => 'Politeknik Negeri Bandung adalah sebuah perguruan tinggi vokasi negeri yang terletak di Jl. Gegerkalong Hilir, Desa Ciwaruga, Kecamatan Parongpong, Kabupaten Bandung Barat. Mulanya POLBAN bernama Politeknik Institut Teknologi Bandung karena berada dalam naungan ITB.',
            'alamat' => 'Jl. Gegerkalong Hilir, Ciwaruga, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559',
            'website' => 'https://www.polban.ac.id/',
            'bidang_usaha' => 'Pendidikan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Organisasi::factory(10)->create();
        User::factory(10)->create();
        Pengajuan::factory(30)->create();
        Referensi::factory(5)->create();
        HasilReview::factory(5)->create();
    }
}
