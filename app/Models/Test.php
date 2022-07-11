<?php

namespace App\Models;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use Translatable, TranslatableHelper;

    protected $fillable = ['is_active'];
    public $translatedAttributes = ['name', 'text'];
    public $timestamps = true;
}