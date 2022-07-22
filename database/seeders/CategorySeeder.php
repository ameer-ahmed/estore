<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
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
                'image_path' => 'electronics.png',
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
                'image_path' => 'books.png',
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
                'image_path' => 'furniture.png',
            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
