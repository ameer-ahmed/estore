<?php

namespace Database\Seeders;

use App\Models\Mutual\Products\ProductOptionExistedSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOptionExistedSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [ // Some default settings
            [
                'key' => 'color',
                'en' => [
                    'name' => 'Color',
                ],
                'ar' => [
                    'name' => 'اللون',
                ],
            ],
            [
                'key' => 'storage',
                'en' => [
                    'name' => 'Storage',
                ],
                'ar' => [
                    'name' => 'المساحة التخزينية'
                ],
            ],
            [
                'key' => 'ram',
                'en' => [
                    'name' => 'RAM',
                ],
                'ar' => [
                    'name' => 'الرامات'
                ],
            ],
        ];
        foreach ($settings as $setting) {
            ProductOptionExistedSetting::create($setting);
        }
    }
}
