<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ // Some default random categories.
            [
                'en' => [
                    'name' => 'Electronics'
                ],
                'ar' => [
                    'name' => 'إلكترونيات'
                ],
                'slug' => 'electronics', // NOTE: Slug must be unique.
                'is_active' => true,
            ],
            [
                'en' => [
                    'name' => 'Books'
                ],
                'ar' => [
                    'name' => 'كتب'
                ],
                'slug' => 'books',
                'is_active' => true,
            ],
            [
                'en' => [
                    'name' => 'Furniture'
                ],
                'ar' => [
                    'name' => 'أثاث المنزل'
                ],
                'slug' => 'furniture',
                'is_active' => true,
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
