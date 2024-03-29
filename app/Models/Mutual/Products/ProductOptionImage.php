<?php

namespace App\Models\Mutual\Products;

use Illuminate\Database\Eloquent\Model;

class ProductOptionImage extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function option() {
        return $this->belongsTo(ProductOption::class);
    }
}
