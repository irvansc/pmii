<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       About::create([
        "title" => "Pergerakan Mahasiswa Islam Indonesia",
        "description"=> "PMII merupakan organisasi gerakan dan kaderisasi yang berlandaskan islam ahlussunah waljamaah. Berdiri sejak tanggal 17 April 1960 di Surabaya dan hingga lebih dari setengah abad kini PMII terus eksis untuk memberikan kontribusi bagi kemajuan bangsa dan negara.",
        "tujuan"=> "Terbentuknya pribadi muslim Indonesia yang bertakwa kepada Allah Swt, Berbudi luhur, berilmu, cakap dan bertanggungjawab dalam mengamalkan ilmunya serta komitmen memperjuangkan cita-cita kemerdekaan Indonesia.",
       ]);
    }
}
