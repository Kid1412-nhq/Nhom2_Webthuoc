<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function getIndex(){
		return view('page.trangchu');
    }

    
    public function getLoaiSp(){
    	return view('page.loai_sanpham');
    }

     public function getChiTietSp(){
    	return view('page.chitiet_sanpham');
    }

     public function getContact(){
    	return view('page.contact');
    }
}
