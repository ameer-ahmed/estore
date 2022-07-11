<?php

namespace App\Http\Controllers\Dashboard\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoriesRequest;
use App\Models\Dashboard\Category;

class CategoriesController extends Controller
{
    public function _create() {
        return view('dashboard.categories.create');
    }

    public function create(CategoriesRequest $request) {
        $isActive = isset($request->is_active) && $request->is_active === 'on';

        // preparing image uploading
        $newImageName = time() . '-' . $request->slug . '.' . $request->image->extension();
//        $request->image->move(UPLOAD_CATEGORIES_IMGS_PATH, $newImageName);
        $request->file('image')->storeAs(UPLOAD_CATEGORIES_IMGS_PATH, $newImageName);
        $category = Category::create([
            'en' => [
                'name' => $request->name_en,
            ],
            'ar' => [
                'name' => $request->name_ar,
            ],
            'slug' => $request->slug,
            'is_active' => $isActive,
            'image_path' => $newImageName,
        ]);
        return redirect()
            ->route('admin-categories-create')
            ->with(['success' => 'Category was added successfully.']);
    }

    public function _all() {
        $categories = Category::paginate(2);

//        return $categories[0]->getTranslation('name', 'ar');
        return view('dashboard.categories.all', compact('categories'));
    }
}
