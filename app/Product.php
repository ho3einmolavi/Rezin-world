<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function main()
    {
        return $this->belongsTo(MainCategory::class , 'main_category_id');
    }

    public function second()
    {
        return $this->belongsTo(SecondaryCategory::class , 'secondary_category_id');
    }

   public function comments()
   {
       return $this->hasMany(Comment::class);
   }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
