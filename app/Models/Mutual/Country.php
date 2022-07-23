<?php

namespace App\Models\Mutual;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
