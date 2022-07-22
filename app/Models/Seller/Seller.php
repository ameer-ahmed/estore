<?php

namespace App\Models\Seller;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['created_at', 'updated_at'];
    protected $hidden = ['password', 'remember_token'];
    public $timestamps = true;
}
