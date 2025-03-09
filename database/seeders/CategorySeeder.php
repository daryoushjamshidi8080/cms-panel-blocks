<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Categories::create([
            'name' =>  'Electronic',
        ]);

        Categories::create([
            'name' =>  'Fashion',
        ]);

        Categories::create([
            'name' =>  'Sports',
        ]);
    }
}
