<?php

namespace Database\Seeders;

use App\Models\Slab;
use Illuminate\Database\Seeder;

class SlabSeeder extends Seeder
{
    public function run(): void
    {
        $slabs = [
            [
                'year_range' => '2024-25',
                'min_income' => 0,
                'max_income' => 600000,
                'fixed_tax' => '0%',
                'percentage_tax' => '(Fully Exempt)',
                'description' => 'Up to 600,000 per annum'
            ],
            [
                'year_range' => '2024-25',
                'min_income' => 600001,
                'max_income' => 1200000,
                'fixed_tax' => '1%',
                'percentage_tax' => 'of amount > 600,000',
                'description' => '600,001 to 1,200,000'
            ],
            [
                'year_range' => '2024-25',
                'min_income' => 1200001,
                'max_income' => 2200000,
                'fixed_tax' => 'Rs. 6,000 + 11%',
                'percentage_tax' => 'of amount > 1.2M',
                'description' => '1,200,001 to 2,200,000'
            ],
            [
                'year_range' => '2024-25',
                'min_income' => 2200001,
                'max_income' => 3200000,
                'fixed_tax' => 'Rs. 116,000 + 23%',
                'percentage_tax' => 'of amount > 2.2M',
                'description' => '2,200,001 to 3,200,000'
            ],
            [
                'year_range' => '2024-25',
                'min_income' => 3200001,
                'max_income' => 4100000,
                'fixed_tax' => 'Rs. 346,000 + 30%',
                'percentage_tax' => 'of amount > 3.2M',
                'description' => '3,200,001 to 4,100,000'
            ],
            [
                'year_range' => '2024-25',
                'min_income' => 4100001,
                'max_income' => null,
                'fixed_tax' => 'Rs. 616,000 + 35%',
                'percentage_tax' => 'of amount > 4.1M',
                'description' => 'Above 4,100,000'
            ],
        ];

        foreach ($slabs as $slab) {
            Slab::create($slab);
        }
    }
}
