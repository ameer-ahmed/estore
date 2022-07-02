<?php

namespace App\Models;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable, TranslatableHelper;
    protected $fillable = ['slug', 'is_active'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
