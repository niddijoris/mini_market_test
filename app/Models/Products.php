<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Products extends Model
{
    // protected $fillable = ['title'];
    protected  $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id","id");
    }

    public function unit(){
        return $this->belongsTo(Unit::class,"unit_id","id");
    }
}
