<?php

namespace Tz\Skolkovo\Database\Seeds;

use Illuminate\Database\Seeder;

class SkolkovoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RatesSeeder::class);
    }
}
