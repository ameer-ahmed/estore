<?php

namespace App\Models\Mutual\Products;

use Illuminate\Database\Eloquent\Model;

class ProductOptionTranslation extends Model
{
    protected $fillable = ['name', 'details', 'about'];
    public $timestamps = false;
}
