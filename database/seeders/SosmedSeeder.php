<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'facebook' => 'https://instagram.com/',
            'instagram' => 'https://youtube.com/',
            'youtube' => 'https://facebook.com/',
            'twitter' => 'https://twitter.com/',
            'web' => 'https://web.com/',
        ]);
    }
}
