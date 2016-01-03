<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Model
{

    public $incrementing = false;

    public function user() {
        return $this->belongsTo('App\User', 'id');
    }

    public function addItem($request) {

        $product = $request->input('product');
        $quantity = $request->input('quantity');
        $unitPrice = $request->input('unitPrice');

        $shoppingCartItem = ShoppingCartItem::create(array(
            'id' => md5(uniqid()),
            'product_id' => $product,
            'shopping_cart_id' => $this->id,
            'quantity' => $quantity,
            'subtotal' => $quantity * $unitPrice,
            'created_by' => Auth::id()
        ));

        $request->session()->push('items', $shoppingCartItem);
        $request->session()->put('itemsCtr', count($request->session()->get('items')));

    }

    public function removeItem($request) {

        $id = $request->input('shoppingCartItem');
        ShoppingCartItem::destroy($id);

        $items = $request->session()->get('items');
        foreach($items as $key => $item) {
            if($item->id == $id) {unset($items[$key]);break;}
        }

        $request->session()->put('items', $items);
        $request->session()->put('itemsCtr', count($items));

    }

    public function items() {
        return $this->hasMany('App\ShoppingCartItem');
    }
}