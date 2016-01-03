@extends('layouts.app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Store List</h2>
    </div></div>

    @if(count($products)>0)
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{URL::to('article/'.$product->slug.'')}}">{{
                                        $product->name }}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{URL::to('news/'.$product->slug.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $product->description !!}</p>

                            <p>
                                <a data-toggle="modal"
                                   data-name="{{ $product->name }}"
                                   data-description="{{ $product->description }}"
                                   data-id="{{ $product->id }}"
                                   data-price="{{ $product->unitPrice }}"
                                   data-quantity="{{ $product->quantity }}"
                                   title="Quick View" class="btn btn-info btn-default quick-view" href="#quickView">Quick View</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <span class="glyphicon glyphicon-usd"></span>
                                <span class="muted">{{ $product->unitPrice }}</span> |
                                <span class="muted">Only {{ $product->quantity }} Left</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="modal fade" id="quickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Product Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6"><img src="http://placehold.it/200x180" alt=""></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <strong><label id="productName"></label></strong>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label id="productDescription"></label>
                                        </div>
                                    </div>
                                    {!! Form::open(array('url' => URL::to('addtocart'), 'method' => 'get', 'class'=> 'form-horizontal', 'id' => 'addToCart')) !!}
                                    <input type="hidden" name="product">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Unit Price</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static" id="productUnitPrice"></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputQty" class="col-sm-2 control-label">QTY</label>
                                        <div class="col-sm-10">
                                            {!! Form::selectRange('number', 1, 1, 1, ['class' => 'form-control', 'id' => 'inputQty']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                                ADD TO CART
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    @endif
@endsection
