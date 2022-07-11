<?php

namespace App\Models\Dashboard;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable, TranslatableHelper;
    protected $fillable = ['slug', 'is_active', 'image_path'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
