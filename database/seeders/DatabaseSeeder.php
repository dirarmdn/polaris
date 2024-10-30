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
        Organisasi::factory(10)->create();
        User::factory(10)->create();
        Pengajuan::factory(30)->create();
        Referensi::factory(5)->create();
        HasilReview::factory(5)->create();
    }
}
