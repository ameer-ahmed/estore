<?php

namespace App\Models;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use Translatable, TranslatableHelper;

    public $translatedAttributes = ['name', 'text'];
    public $timestamps = true;


}
