<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdCategory extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function second()
    {
        return $this->belongsTo(SecondaryCategory::class , 'secondary_category_id');
    }

    public function main()
    {
        return $this->belongsTo(MainCategory::class , 'main_category_id');
    }
}
