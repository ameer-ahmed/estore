<?php

namespace App\Models\Dashboard;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = ['created_at', 'updated_at'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public function sidebarLinks() {
        return $this->select(['id'])->get();
    }
}
