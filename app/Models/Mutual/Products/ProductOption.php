<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = ['created_at', 'updated_at'];
    public $translatedAttributes = ['name', 'details', 'about'];
    public $timestamps = true;
}
