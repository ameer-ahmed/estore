<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\AddCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function _create() {
        return view('admin.categories.create');
    }

    public function create(AddCategoryRequest $request) {
        $isActive = isset($request->is_active) && is_bool($request->is_active) ;
        // preparing image uploading
        $newImageName = isset($request->image) ? time() . '-' . $request->slug . '.' . $request->image->extension() : '';
//        $request->image->move(UPLOAD_CATEGORIES_IMGS_PATH, $newImageName);
        $request->file('image')?->storeAs(UPLOAD_CATEGORIES_IMGS_PATH, $newImageName);
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
        if($category) {
            return redirect()
                ->route('admin-categories-create')
                ->with(['success' => 'Category was added successfully.']);
        }
        return redirect()
            ->route('admin-categories-create')
            ->with(['error' => 'Something went wrong!']);
    }

    public function _all() {
        $categories = Category::orderBy('id', 'desc')->paginate(2);
        return view('admin.categories.all', compact('categories'));
    }

    // EDIT CATEGORY METHODS

    public function _edit($id) {
        $category = Category::where('id', $id)->first();
        if($category !== null) {
            session(['category_id' => $category->id]);
            return view('admin.categories.edit', compact('id', 'category'));
        }
        return redirect()->route('admin-categories-all');
    }

    public function edit(UpdateCategoryRequest $request, $id, $operation = null) {
        $category = Category::where('id', $id)->first();
        if($category !== null) {
            if($operation == 'update_category')
                return $this->updateCategory($category, $request, $id);
            elseif($operation == 'delete_image') {
                return $this->deleteImage($category);
            }
            elseif($operation == 'change_image') {
                return $this->changeImage($category, $request);
            }
            elseif($operation == 'toggle_activation') {
                return $this->toggleActivation($category);
            }
            else {
                return $this->backToEdit();
            }
        }
        return redirect()->route('admin-categories-all');
    }

    private function updateCategory($category, $request) {
        if(requestMethodIs('post')) {
            $category->translate('en')->name = $request->name_en;
            $category->translate('ar')->name = $request->name_ar;
            $category->slug = $request->slug;
            $category->save();
            return redirect()->route('admin-categories-edit', session()->get('category_id'))->with(['success' => 'Category #' . $category->id . ' was updated successfully.']);
        }
        return $this->backToEdit();
    }

    private function deleteImage($category) {
        if(!empty($category->image_path)) {
            $imagePath = UPLOAD_CATEGORIES_IMGS_PATH . $category->getRawOriginal('image_path');
            Storage::delete($imagePath);
            $category->image_path = null;
            $category->save();
            return $this->backToEdit()->with(['image_delete_success' => 'Image was deleted successfully.']);
        }
        return $this->backToEdit()->with(['image_delete_error' => 'An error occurred.']);
    }

    private function changeImage($category, $request) {
        if($request->upload == 'change_image') {
            if(!empty($category->image_path)) { // Deleting old image, firstly.
                $oldImagePath = UPLOAD_CATEGORIES_IMGS_PATH . $category->getRawOriginal('image_path');
                Storage::delete($oldImagePath);
            }
            $newImageName = time() . '-' . $category->slug . '.' . $request->image->extension();
            $request->file('image')->storeAs(UPLOAD_CATEGORIES_IMGS_PATH, $newImageName);
            $category->image_path =$newImageName;
            $category->save();
            return $this->backToEdit()->with(['image_delete_success' => 'Image was changed successfully.']);
        }
    }

    private function toggleActivation($category) {
        $category->is_active = !$category->getRawOriginal('is_active');
        $category->save();
        return $this->backToEdit();
    }

    private function backToEdit() {
        return redirect()->route('admin-categories-edit', session()->get('category_id'));
    }
}
