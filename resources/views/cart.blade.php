@extends('layouts.cart')

@section('content')
<div class="container cart">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <a href="{{ route('reset.card') }}" class="btn btn-danger"><i class="fa fa-power-off mr-2"></i>Reset Card</a>
        </div>
    </div>
    <div class="row justify-content-center content">
        <div class="col-lg-3">
            PRODUCT
        </div>
        <div class="col-lg-3">
            PRICE
        </div>
        <div class="col-lg-3">
            QTY
        </div>
        <div class="col-lg-3">
            TOTAL
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 mt-4">
            <div class="row">
                @if($gifts)
                @foreach($gifts as $key=>$gift)
                <div class="col-md-12 mt-2">
                    <div class="gift-box w-100">
                        <div class="row">
                            <div class="col-lg-3 justify-content-center">
                                <img class="w-100 h-auto" src="{{  $gift['photo'] }}" />
                            </div>
                            <div class="col-lg-3 justify-content-center">
                                <span class="d-block">{{ $gift['price'] }} $</span>

                            </div>
                            <div class="col-lg-3 justify-content-center">
                                <a href="{{ route('add.cart', ['gift' => $key]) }}" class="btn btn-success pull-right" style="float:right"><i class="fa fa-plus"></i></a>
                                <a href="{{ route('lower.quantity.cart', ['gift' => $key]) }}" class="btn btn-primary pull-right ml-1"><i class="fa fa-minus"></i></a>
                            </div>
                            <div class="col-lg-3 justify-content-right">
                                <span class="d-block" style="float:right">{{ $gift['price'] }} $</span>

                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                @else
                There are no gifts in the cart :)
                @endif
            </div>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
</div>
@endsection