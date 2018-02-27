<?php

namespace Rimorsoft\Http\Controllers;

use Illuminate\Http\Request;
use Rimorsoft\Product;//*3
use Rimorsoft\Http\Requests\ProductRequest;//*16CtrllProduct

class ProductController extends Controller
{
 	public function index(){//*1

 		$products = Product::orderBy('id')->paginate();//*4
 		return view('products.index', compact('products'));//*2 *5
	}
	public function store(ProductRequest $request){
		$product = new Product;//*23CtrllProduct:

		$product->name = $request->name;//*24CtrllProduct:
		$product->short = $request->short;
		$product->body = $request->body;

		$product->save();//*25CtrllProduct:
		
		return redirect()->route('products.index')
						->with('info', 'El producto id:'.$product->id.' fué actualizado');
	}
	
	public function edit($id){//*12CtrllProduct
		$product = Product::find($id);
		return view('products.edit', compact('product'));//*13CtrllProduct
	}
	public function update(ProductRequest $request,$id){//*18CtrllProduct:
		$product = Product::find($id);// *20CtrllProduct:

		$product->name = $request->name;// *21CtrllProduct:
		$product->short = $request->short;
		$product->body = $request->body;

		$product->save();// *22CtrllProduct:
		//return $request->name;//*19CtrllProduct:
		return redirect()->route('products.index')
						->with('info', 'El producto id:'.$product->id.' fué actualizado');
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