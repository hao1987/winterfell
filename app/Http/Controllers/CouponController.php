<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShoppingCart;
use App\ShoppingCartItem;
use App\Coupon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;


class CouponController extends Controller {

	public function apply(Request $request) {

		$code = $request->input('coupon');

		$coupon = Coupon::ofCode($code);
		$status = is_object($coupon) ? $coupon->validateCoupon() : $coupon;

		return is_object($status) ? $coupon->toJson() : response()->json(['error' => $status]);
	}
}
