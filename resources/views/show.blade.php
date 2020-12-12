@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($list->items)
        @foreach($list->items as $item)

        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>{{ $item->gift->name }}
                    </div>
                    <span class="d-block" style="float:left">{{ $item->gift->price }} $</span>

                </div>

                <div class="card-body">
                    <img class="w-100 h-auto" src="{{  $item->gift->pic_url }}" />
                    <p>{{ $item->gift->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between mt-1">
                        <a href="{{ route('remove.favourites', $item) }}" class="btn btn-danger pull-right" style="float:right"><i class="fa fa-trash mr-1"></i>Remove from list</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @endif
    </div>
</div>


@endsection