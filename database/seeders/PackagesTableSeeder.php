<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('packages')->insert([
                'uuid' => Str::uuid(),
                'name' => 'Package ' . $i,
                'limit' => rand(3, 8), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
