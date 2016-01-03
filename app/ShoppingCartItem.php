<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    public $incrementing = false;

    protected $fillable = array('id', 'shopping_cart_id', 'product_id', 'quantity', 'subtotal');

    public function ShoppingCart() {
        return $this->belongsTo('App\ShoppingCart');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}