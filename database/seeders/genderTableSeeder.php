<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Genders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();

        $genders = ['Male','Female'];
        
        foreach ($genders as $ge) {
            Gender::create(['name' => $ge]);
        }
    }
}