<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;
    // public function products(){
    //     return $this->hasOne(products::class,'id','product_id');
    // }
    // public function categories(){
    //     return $this->hasOne(category::class,'id','category_id');
    // }

    public function products() {
        return $this->belongsToMany('App\products', 'product_categories', 'category_id', 'product_id');
    }


}
