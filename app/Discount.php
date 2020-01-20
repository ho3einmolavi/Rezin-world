<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function main()
    {
        return $this->hasMany(MainCategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
