<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTranslation extends Model
{
    protected $fillable = ['name', 'text'];
    public $timestamps = false;
}
