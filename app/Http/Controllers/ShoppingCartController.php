<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShoppingCart;
use App\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShoppingCartController extends Controller {

	public function index(Request $request) {

		$shoppingCart = $request->session()->get('cart');
		$shoppingCartItems = $request->session()->get('items');

		return view('pages.cart', compact('shoppingCart', 'shoppingCartItems'));
	}

}
