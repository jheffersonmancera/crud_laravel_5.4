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
	public function edit($id){//*12CtrllProduct
		$product = Product::find($id);
		return view('products.edit', compact('product'));//*13CtrllProduct
	}
	public function create(){//*14CtrllProduct
		return view('products.create');//*15CtrllProduct
	}

	public function show($id){//*6

		$product = Product::find($id);//*7
		return view('products.show', compact('product'));//*8

	}

	public function destroy($id){
		$product = Product::find($id);//*9
		$product->delete();//*10

		return back()->with('info', 'El producto id:'.$product->id.' fué eliminado'); //*11CtrllProduct 

	}
}