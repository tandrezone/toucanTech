<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * Number of schools test to create with this seed
     */
    const NUMBER_OF_SCHOOLS = 10;

    /**
     * Create random schools
     *
     * @return void
     */
    public function run()
    {
        for($numberSchools = 0; $numberSchools < self::NUMBER_OF_SCHOOLS; $numberSchools++) {
            DB::table('schools')->insert([
                'name' => 'School of ' . Str::random(10) . ' test'
            ]);
        }
    }
}
