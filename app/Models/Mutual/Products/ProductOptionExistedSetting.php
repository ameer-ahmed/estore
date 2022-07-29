<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductOptionExistedSetting extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = [];
    public $timestamps = false;
    protected $translationForeignKey = 'setting_id';
    public $translatedAttributes = ['name'];
}
