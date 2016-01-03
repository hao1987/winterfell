<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use App\ShoppingCartItem;

use DB;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::where('quantity', '>' , 0)->orderBy('created_at', 'DESC')->limit(10)->get();

		$id = Auth::id();
		$shoppingCart = ShoppingCart::find(md5($id));

		return view('pages.home', compact('products', 'shoppingCart'));
	}

}