<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Organisasi;
use App\Models\Pengaju;
use App\Models\Pengajuan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Organisasi::factory(10)->create(); // Buat 10 organisasi
        \App\Models\Pengaju::factory(20)->create(); // Buat 20 pengaju
        Admin::factory(5)->create(); // Buat 5 admin
        Pengajuan::factory(30)->create(); // Buat 30 pengajuan
    }
}
