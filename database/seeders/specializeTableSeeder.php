<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specializeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = ['Arabic','English','Sciences','Social Studies','physics','chemistry','French','math','biology','geography','history','philosophy','psychology','statistics','Religious','Computer'];


        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}