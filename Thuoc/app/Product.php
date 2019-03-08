<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";

     public function product_type(){
    	return $this->belongsTo('App\ChiTietDonHang','MaDH','MaSP');
    }
}
