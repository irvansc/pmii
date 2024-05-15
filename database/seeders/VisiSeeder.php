<?php

namespace Database\Seeders;

use App\Models\Visi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visi::create([
            'desc' => 'Transformasi Organisasi untuk PMII Maju dan Mendunia',
        ]);
    }
}
