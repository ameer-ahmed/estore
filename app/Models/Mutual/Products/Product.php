<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = [];
    public $translatedAttributes = ['description'];
    public $timestamps = true;
}
