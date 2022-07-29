<?php

namespace App\Models\Mutual\Products;

use App\Http\Traits\TranslatableHelper;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductOptionSetting extends Model
{
    use Translatable, TranslatableHelper;
    protected $guarded = [];
    protected $translationForeignKey = 'setting_id';
    public $translatedAttributes = ['value'];
    public $timestamps = false;

    public function option() {
        return $this->belongsTo(ProductOption::class);
    }
}
