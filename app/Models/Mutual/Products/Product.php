<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = ['created_at', 'updated_at'];
    public $translatedAttributes = ['description'];
    public $timestamps = true;

    public function options() {
        return $this->hasMany(ProductOption::class);
    }
}
