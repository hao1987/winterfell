<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShoppingCart;
use App\ShoppingCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ShoppingCartItemController extends Controller {

	public function index(Request $request) {
		$shoppingCart = $request->session()->get('cart');
		$shoppingCartItems = $request->session()->get('items');

		return view('pages.cart', compact('shoppingCart', 'shoppingCartItems'));
	}

	public function add(Request $request) {

		$shoppingCart = $request->session()->get('cart');
		$shoppingCart->addItem($request);
	}

	public function remove(Request $request) {

		$shoppingCart = $request->session()->get('cart');
		$shoppingCart->removeItem($request);
	}

}
