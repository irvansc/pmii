<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'web_name'=>'PK PMII KHARISMA',
            'web_tagline'=>'PK PMII KHARISMA THE BEST',
            'web_email' => 'admin@wkngproject.com',
            'web_email_noreply' => 'noreply@wkngproject.com',
            'web_telp' => '085725071996',
            'web_maps' => 'https://maps.app.goo.gl/SnXsikK7A8VCGxHU6',
            'web_desc'=> 'PK PMII KHARISMA THE BEST',
            'web_alamat' => 'Kp Cicewol RT 03 RW 01 Des. Mekarsari Kec.Cicurug Kab. Sukabumi 43359',
        ]);
    }
}
