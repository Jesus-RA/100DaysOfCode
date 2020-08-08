<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        return view('payments.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        // Using database transactions
        return DB::transaction(function() use($order){

            $this->cartService->getCartFromCookie()->products()->detach();
    
            $order->payment()->create([
                'amount' => $order->total,
                'payed_at' => now(),
            ]);
    
            $order->status = 'payed';
            $order->save();
    
            return redirect()
                ->route('main')
                ->withSuccess("Thanks! Your payment for \$ {$order->total} was successful.");

        }, 5);
    }
}
