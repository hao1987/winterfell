@extends('layouts.app')
@section('title') Home :: @parent @stop
@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h3>Shopping Cart</h3>
            <input type="hidden" name="shoppingCart" value="{!! $shoppingCart->id !!}">
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 text-right">
            <a class="btn btn-success btn-default" href="{{ URL::to('home') }}">Continue Shopping</a>
            <a class="btn btn-info btn-default" data-toggle="modal" data-target="#checkoutModal" href="javascript:;">Check Out</a>

            <!-- checkout Modal -->
            @if(count($shoppingCartItems)>0)
            <div class="modal fade text-left" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Order Summary</h4>
                        </div>
                        <div class="modal-body">
                            <?php $total = 0 ?>
                            @foreach ($shoppingCartItems as $item)
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>{{ $item->product->name }}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><span class="glyphicon glyphicon-usd "></span><span
                                                class="muted">{{ $item->subtotal }}</span></strong>
                                    </div>
                                </div>
                                <?php $total += $item->subtotal; ?>
                            @endforeach
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="text-capitalize"><strong>total:</strong></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4><span class="glyphicon glyphicon-usd "></span><span
                                                class="muted" id="total">{{ $total }}</span></h4>
                                </div>
                            </div><hr>
                            <h4>Apply Coupon</h4>
                            <p>If you have a coupon code, please apply it before placing your order.</p>
                            {!! Form::open(array('url' => URL::to('apply/coupon'), 'method' => 'post',  'class' => 'form-inline', 'id' => 'applyCoupon')) !!}

                                <div class="form-group {{ $errors->has('coupon') ? 'has-error' : '' }}">
                                    <div class="controls">
                                        {!! Form::text("couponCode", null, array("class" => "form-control", "placeholder" => "Enter Coupon Code")) !!}
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-default text-capitalize">apply</button>

                            {!! Form::close() !!}
                            <hr><h4>Payment & Shipping Details</h4>
                            <p>Payment detail is using <a href="https://stripe.com/" target="_blank" class="tooltip-test" title="" data-original-title="Stripe">Stripe Library</a>, which is omitted for the sake of simplicity.</p>
                        </div>
                        <div class="modal-footer"><a href="javascript:;"
                                                     data-realcharges="{{ $total }}"
                                                     data-totalcharges="{{ $total }}" class="btn btn-success btn-primary text-capitalize" id="placeOrder">place my order</a> </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row"><hr></div>
    @if(count($shoppingCartItems)>0)
        @foreach ($shoppingCartItems as $item)
            <div class="row">
                <div class="col-md-8">
                    <h4>
                        <strong><a href="{{ URL::to('article/'.$item->slug.'') }}">{{ $item->name }}</a></strong>
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="javascript:;" class="thumbnail"><img
                                src="http://placehold.it/260x180" alt=""></a>
                </div>
                <div class="col-md-8">
                    <p>{!! $item->product->description !!}</p>
                    <p>
                        SubTotal: <strong><span class="glyphicon glyphicon-usd "></span><span
                                class="muted">{{ $item->subtotal }}</span></strong> |
                        Quantity: <strong>{{ $item->quantity }}</strong> |
                        Added: <span
                                class="glyphicon glyphicon-calendar"></span> {{ $item->created_at }}
                    </p>
                </div>
                <div class="col-md-2">
                    <p>
                        <a data-id="{{ $item->id }}" class="btn btn-mini btn-default remove-from-cart" href="javascript:;">Remove</a>
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info" role="alert">Your shopping cart is empty. Your Shopping Cart lives to serve. Give it purpose — check our <a href="home">store list</a> and fill it with goods.</div>
    @endif
@endsection
