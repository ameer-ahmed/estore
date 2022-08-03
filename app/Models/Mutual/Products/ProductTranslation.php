<?php

namespace App\Models\Mutual\Products;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = ['initial_name', 'description', 'slug'];
    public $timestamps = false;
}
