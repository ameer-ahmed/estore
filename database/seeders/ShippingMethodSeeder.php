<?php

namespace Database\Seeders;

use App\Models\Admin\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingMethod::create([
            'en' => [
                'name' => 'Free shipping',
            ],
            'ar' => [
                'name' => 'شحن مجاني',
            ],
            'tariff_start' => 0.0,
            'kilogram_tariff' => 0.0,
            'minimum_kilogram_tariff' => 0.0,
            'is_active' => true,
        ]);
    }
}
