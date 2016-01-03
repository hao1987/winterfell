<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{

    public $incrementing = false;
    protected $fillable = array('id', 'coupon', 'user_id', 'order_data', 'real_charges', 'amount_off');

    public function scopeOfUserId($query, $id) {
        return $query->where('user_id', '=', $id);
    }

    public function placeOrder($request) {
        $shoppingCart = $request->session()->get('cart');
        $shoppingCartItems = $request->session()->get('items');
        $user = Auth::user();

        $code = $request->input('coupon');
        $coupon = Coupon::ofCode($code);

        $transaction = Transaction::create(array(
            'id' => md5(uniqid()),
            'coupon' => is_object($coupon) ? $coupon->id : '',
            'user_id' => $user->id,
            'order_data' => json_encode($shoppingCartItems),
            'real_charges' => $request->input('realCharges'),
            'amount_off' => $request->input('amountOff'),
        ));

        ShoppingCartItem::where('shopping_cart_id', $shoppingCart->id)->delete();
        if(is_object($coupon)) {
            Coupon::where('id', $coupon->id)->update(['times_redeemed' => $coupon->times_redeemed + 1]);
        }

        $request->session()->forget('items');
        $request->session()->put('itemsCtr', 0);

    }

    public function user() {
        return $this->belongsTo('App\User', 'id');
    }

    public function coupon() {
        return $this->belongsTo('App\Coupon');
    }
}