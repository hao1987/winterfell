<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{

    public $incrementing = false;
    protected $visible = ['amount_off', 'percent_off'];


    public function scopeOfCode($query, $code) {
        $coupon = $query->where('code', '=', $code)->first();
        return isset($coupon) ? $coupon : $this->getInvalidErrorMessage();
    }

    public function redeem() {
//        return $this->validateCoupon();
    }

    public function validateCoupon() {
        if(strtotime($this->expire_at) < time()) {
            return $this->getExpiredErrorMessage();
        } else {
            if ($this->type == 'onetime') {
                $user = Auth::user();
                if (count($user->transactions)) {
                    foreach ($user->transactions as $transaction) {
                        if ($transaction->coupon == $this->id) {
                            return $this->getOneTimeOnlyErrorMessage();
                        }
                    }
                }
            }
        }
        return $this;
    }

    protected function getExpiredErrorMessage() {
        return Lang::get('auth.expired');
    }

    protected function getInvalidErrorMessage() {
        return Lang::get('auth.invalid');
    }

    protected function getOneTimeOnlyErrorMessage() {
        return Lang::get('auth.onetime_only');
    }


    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}