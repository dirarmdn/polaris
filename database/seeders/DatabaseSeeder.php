<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Reviewer;
use App\Models\Pengajuan;
use App\Models\Reference;
use App\Models\Referensi;
use App\Models\Submitter;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Submission;
use App\Models\HasilReview;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Organization::create([
            'organization_code' => 'POL1234',
            'organization_name' => 'Politeknik Negeri Bandung',
            'company_description' => 'Politeknik Negeri Bandung adalah sebuah perguruan tinggi vokasi negeri yang terletak di Jl. Gegerkalong Hilir, Desa Ciwaruga, Kecamatan Parongpong, Kabupaten Bandung Barat. Mulanya POLBAN bernama Politeknik Institut Teknologi Bandung karena berada dalam naungan ITB.',
            'address' => 'Jl. Gegerkalong Hilir, Ciwaruga, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559',
            'website' => 'https://www.polban.ac.id/',
            'business_field' => 'Pendidikan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Organization::factory(10)->create();
        User::factory(10)->create();
        Submitter::factory(10)->create();
        Submission::factory(30)->create();
        Reference::factory(5)->create();
        // Review::factory(5)->create();
        Reviewer::factory(10)->create();
    }
}
