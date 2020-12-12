@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <a href="{{ route('reset.card') }}" class="btn btn-danger"><i class="fa fa-power-off mr-2"></i>Reset Card</a>
        </div>
    </div>
 
            <div class="row">
                @if($gifts)
                @foreach($gifts as $key=>$gift)
                <div class="col-md-3 mt-2 gift-box">
                    <div class="">
                        <div class="gift-box-body  wow fadeIn">
                            <img class="w-100 h-auto" src="{{  $gift['photo'] }}" />
                            <div class="gift-box-header mt-4 d-flex justify-content-between">
                                <div class="name">{{ $gift['name'] }}</div>
                                <a href="{{ route('add.favourites', ['gift' => $key]) }}"> <i class="fa fa-star" style="color:green"></i> </a>
                            </div>
                        </div>

                    <p>{{ $gift['description'] }}</p>

                    <div class="gift-box-footer">
                        <span class="d-block" style="float:left">{{ $gift['price'] }} $</span>
                        <span class="d-block" style="float:right">x{{  $gift['quantity'] }} on cart</span>
                        <br />
                        <div class="d-flex justify-content-between mt-3">
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('add.cart', ['gift' => $key]) }}" class="btn btn-outline-success pull-right" style="float:right;padding: 14px;"><i class="fa fa-plus"></i></a>
                                <a href="{{ route('lower.quantity.cart',['gift' => $key]) }}" class="btn btn-outline-primary pull-right ml-1" style="padding: 14px;"><i class="fa fa-minus"></i></a>
                            </div>
                            <a href="{{ route('remove.cart', ['gift' => $key]) }}" class="btn btn-outline-danger pull-right" style="float:right;padding: 14px;"><i class="fa fa-trash"></i></a>
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
      
</div>


@endsection