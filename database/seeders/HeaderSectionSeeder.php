<?php

namespace Database\Seeders;

use App\Models\HeaderSection;
use Illuminate\Database\Seeder;

class HeaderSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeaderSection::create([
            "title" => 'Upgrade Your Knowledge and Skills with PMII',
            'description' => 'We are Indonesian Moslem Student Movement',
            'img' => null
        ]);
    }
}
