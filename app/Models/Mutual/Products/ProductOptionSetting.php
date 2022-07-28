<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductOptionSetting extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = [];
    public $translatedAttributes = ['value'];
    public $timestamps = false;
}
