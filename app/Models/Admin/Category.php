<?php

namespace App\Models\Admin;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable, TranslatableHelper;
    protected $fillable = ['slug', 'is_active', 'image_path'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    protected function isActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? 'Active' : 'Inactive',
        );
    }

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !empty($value) ? CATEGORIES_IMGS_ACCESS . $value : '',
        );
    }
}
