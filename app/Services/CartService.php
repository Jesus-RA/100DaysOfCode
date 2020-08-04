<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Cart;

class CartService
{
    protected $cookieName = 'cart';

    public function getCartFromCookie(){
        $cartId = Cookie::get($this->cookieName);
        $cart = Cart::find($cartId);
        return $cart;
    }

        public function getCartFromCookieOrCreate(){
        $cart = $this->getCartFromCookie();
        return $cart ?? Cart::create();        
    }

    public function makeCookie(Cart $cart){
        // Cookie::make('nombre', valor, tiempo);
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    public function countProducts(){
        $cart = $this->getCartFromCookie();
        if($cart != null){
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }
}