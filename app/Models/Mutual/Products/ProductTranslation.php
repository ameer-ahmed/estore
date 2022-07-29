<?php

namespace App\Models\Mutual\Products;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = ['description', 'slug'];
    public $timestamps = false;
}