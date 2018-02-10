<?php

namespace Rimorsoft\Http\Controllers;

use Illuminate\Http\Request;
use Rimorsoft\Product;//*3

class ProductController extends Controller
{
 	public function index(){//*1

 		$products = Product::orderBy('id')->paginate();//*4
 		return view('products.index', compact('products'));//*2 *5
	}

	public function show($id){//*6

		$product = Product::find($id);//*7
		return view('products.show', compact('product'));//*8

	}
	
}