@extends('layouts.app')
@section('title') Home :: @parent @stop
@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h3>My Orders</h3>
        </div>
    </div>
    <div class="row"><hr></div>
    @if(count($transactions)>0)
        @foreach ($transactions as $transaction)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4>
                        Total Cost: <strong>${{ $transaction->real_charges }}</strong>
                        {{ ($transaction->amount_off > 0 ? '| You Saved: $' . $transaction->amount_off : '') }}
                        <span style="float:right">Order Placed: {{ date("F j, Y", strtotime($transaction->created_at)) }}</span>
                    </h4>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                @foreach (json_decode($transaction->order_data) as $order)
                    <div class="row">
                        <div class="col-md-2">
                            <a href="javascript:;" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-8">
                            <p>{!! $order->product->name !!}</p>
                            <p>{!! $order->product->description !!}</p>
                            <p>
                                Total Cost: <strong><span class="glyphicon glyphicon-usd "></span><span
                                            class="muted">{{ $order->subtotal }}</span></strong> |
                                Quantity: <strong>{{ $order->quantity }}</strong>
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info" role="alert">You have not placed any orders recently.</div>
    @endif
@endsection
