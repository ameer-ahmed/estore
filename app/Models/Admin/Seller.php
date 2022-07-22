<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    protected $hidden = ['password'];
}
