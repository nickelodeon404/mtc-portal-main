<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can customize this data as per your requirements
        $provinces = [
            ["id" => 1, "name" => "Abra"],
            ["id" => 2, "name" => "Agusan del Norte"],
            ["id" => 3, "name" => "Agusan del Sur"],
            ["id" => 4, "name" => "Aklan"],
            ["id" => 5, "name" => "Albay"],
            ["id" => 6, "name" => "Antique"],
            ["id" => 7, "name" => "Apayao"],
            ["id" => 8, "name" => "Aurora"],
            ["id" => 9, "name" => "Basilan"],
            ["id" => 10, "name" => "Bataan"],
            ["id" => 11, "name" => "Batanes"],
            ["id" => 12, "name" => "Batangas"],
            ["id" => 13, "name" => "Benguet"],
            ["id" => 14, "name" => "Biliran"],
            ["id" => 15, "name" => "Bohol"],
            ["id" => 16, "name" => "Bukidnon"],
            ["id" => 17, "name" => "Bulacan"],
            ["id" => 18, "name" => "Cagayan"],
            ["id" => 19, "name" => "Camarines Norte"],
            ["id" => 20, "name" => "Camarines Sur"],
            ["id" => 21, "name" => "Camiguin"],
            ["id" => 22, "name" => "Capiz"],
            ["id" => 23, "name" => "Catanduanes"],
            ["id" => 24, "name" => "Cavite"],
            ["id" => 25, "name" => "Cebu"],
            ["id" => 26, "name" => "Cotabato"],
            ["id" => 27, "name" => "Davao de Oro"],
            ["id" => 28, "name" => "Davao del Norte"],
            ["id" => 29, "name" => "Davao del Sur"],
            ["id" => 30, "name" => "Davao Occidental"],
            ["id" => 31, "name" => "Davao Oriental"],
            ["id" => 32, "name" => "Dinagat Islands"],
            ["id" => 33, "name" => "Eastern Samar"],
            ["id" => 34, "name" => "Guimaras"],
            ["id" => 35, "name" => "Ifugao"],
            ["id" => 36, "name" => "Ilocos Norte"],
            ["id" => 37, "name" => "Ilocos Sur"],
            ["id" => 38, "name" => "Iloilo"],
            ["id" => 39, "name" => "Isabela"],
            ["id" => 40, "name" => "Kalinga"],
            ["id" => 41, "name" => "La Union"],
            ["id" => 42, "name" => "Laguna"],
            ["id" => 43, "name" => "Lanao del Norte"],
            ["id" => 44, "name" => "Lanao del Sur"],
            ["id" => 45, "name" => "Leyte"],
            ["id" => 46, "name" => "Maguindanao"],
            ["id" => 47, "name" => "Marinduque"],
            ["id" => 48, "name" => "Masbate"],
            ["id" => 49, "name" => "Misamis Occidental"],
            ["id" => 50, "name" => "Misamis Oriental"],
            ["id" => 51, "name" => "Mountain Province"],
            ["id" => 52, "name" => "Negros Occidental"],
            ["id" => 53, "name" => "Negros Oriental"],
            ["id" => 54, "name" => "Northern Samar"],
            ["id" => 55, "name" => "Nueva Ecija"],
            ["id" => 56, "name" => "Nueva Vizcaya"],
            ["id" => 57, "name" => "Occidental Mindoro"],
            ["id" => 58, "name" => "Oriental Mindoro"],
            ["id" => 59, "name" => "Palawan"],
            ["id" => 60, "name" => "Pampanga"],
            ["id" => 61, "name" => "Pangasinan"],
            ["id" => 62, "name" => "Quezon"],
            ["id" => 63, "name" => "Quirino"],
            ["id" => 64, "name" => "Rizal"],
            ["id" => 65, "name" => "Romblon"],
            ["id" => 66, "name" => "Samar"],
            ["id" => 67, "name" => "Sarangani"],
            ["id" => 68, "name" => "Siquijor"],
            ["id" => 69, "name" => "Sorsogon"],
            ["id" => 70, "name" => "South Cotabato"],
            ["id" => 71, "name" => "Southern Leyte"],
            ["id" => 72, "name" => "Sultan Kudarat"],
            ["id" => 73, "name" => "Sulu"],
            ["id" => 74, "name" => "Surigao del Norte"],
            ["id" => 75, "name" => "Surigao del Sur"],
            ["id" => 76, "name" => "Tarlac"],
            ["id" => 77, "name" => "Tawi-Tawi"],
            ["id" => 78, "name" => "Zambales"],
            ["id" => 79, "name" => "Zamboanga del Norte"],
            ["id" => 80, "name" => "Zamboanga del Sur"],
            ["id" => 81, "name" => "Zamboanga Sibugay"],
        ];


        // Insert data into the 'provinces' table
        DB::table('provinces')->insert($provinces);
    }
}
