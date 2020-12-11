@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('reset.card') }}" class="btn btn-danger"><i class="fa fa-power-off mr-2"></i>Reset Card</a>
        </div>
    </div>
    <div class="row justify-content-center content">
        @if($gifts)
        @foreach($gifts as $key=>$gift)
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-header">{{ $gift['name'] }}</div>

                <div class="card-body">
                    <img class="w-100 h-auto" src="{{  $gift['photo'] }}" />
                    <p>{{ $gift['description'] }}</p>
                </div>
                <div class="card-footer">
                    <span class="d-block" style="float:left">{{ $gift['price'] }} $</span>
                    <span class="d-block" style="float:right">{{ $gift['quantity'] }} on cart</span>
                    <br />
                    <div class="d-flex justify-content-between mt-3">
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('add.cart', ['gift' => $key]) }}" class="btn btn-success pull-right" style="float:right"><i class="fa fa-plus"></i></a>
                            <a href="{{ route('lower.quantity.cart', ['gift' => $key]) }}" class="btn btn-primary pull-right ml-1"><i class="fa fa-minus"></i></a>
                        </div>
                        <a href="{{ route('remove.cart', ['gift' => $key]) }}" class="btn btn-danger pull-right" style="float:right"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection