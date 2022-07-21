<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethodTranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
