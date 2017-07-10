<?php

namespace Tz\Skolkovo\Database\Seeds;

use Illuminate\Database\Seeder;
use Tz\Skolkovo\Repository\RateRepository;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param RateRepository $rateRepository
     * @return void
     */
    public function run(RateRepository $rateRepository)
    {
        $rateRepository->create([
            'name' => 'Тариф 1',
            'description' => 'lorem ipsum',
            'price' => 12000,
        ]);
        $rateRepository->create([
            'name' => 'Тариф 2',
            'description' => 'lorem ipsum',
            'price' => 13000,
        ]);
        $rateRepository->create([
            'name' => 'Тариф 3',
            'description' => 'lorem ipsum',
            'price' => 14000,
        ]);
    }
}
