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

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function images() {
        return $this->hasMany(ProductOptionImage::class);
    }

    public function settings() {
        return $this->hasMany(ProductOptionSetting::class);
    }
}
