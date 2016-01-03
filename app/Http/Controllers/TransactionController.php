<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShoppingCart;
use App\ShoppingCartItem;
use App\Coupon;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;


class TransactionController extends Controller {

	public function placeOrder(Request $request) {
		$transaction = new Transaction();
		$transaction->placeOrder($request);

		return redirect()->route('home');
	}

	public function history() {
		$user = Auth::user();
		$transactions = Transaction::ofUserId($user->id)->orderBy("created_at")->get();

		return view('pages.history', compact('transactions'));
	}

}
