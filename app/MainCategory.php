<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MainCategory extends Model
{
    protected $guarded = [];

    public function secondaryCategories()
    {
        return $this->hasMany(SecondaryCategory::class);
    }

    public function Brands()
    {
        return $this->hasMany(Brand::class);
    }


      public function thirdCategories()
     {
         return $this->hasMany(ThirdCategory::class);
     }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($main) {
            // before delete() method call this
            $main->secondaryCategories()->delete();
            $main->thirdCategories()->delete();

            // do the rest of the cleanup...
        });
    }
}
