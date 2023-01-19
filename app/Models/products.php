<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    // public function productss()
    // {
    //     return $this->hasOne(product_category::class,'product_id','id');//forduct id is foregen key and id is local id and at first we defin model
    // }
    public function Pricevariation(){
        return $this->hasOne(pricevariation::class,'product_id','id');
    }
}
