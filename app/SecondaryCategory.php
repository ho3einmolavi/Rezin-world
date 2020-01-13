<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    protected $guarded = [];

    public function thirdCategories()
    {
        return $this->hasMany(ThirdCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function main()
    {
        return $this->belongsTo(MainCategory::class , 'main_category_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($main) {

            $main->thirdCategories()->delete();

        });
    }
}
