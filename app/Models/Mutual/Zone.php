<?php

namespace App\Models\Mutual;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name', 'country_id'];
    public $timestamps = false;
}
