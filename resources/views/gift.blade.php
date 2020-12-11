<div class="col-md-3 mt-2">
    <div class="card">
        <div class="card-header">{{ $gift->name }}</div>

        <div class="card-body">
            <img class="w-100 h-auto" src="{{  $gift->pic_url }}" />
            <p>{{ $gift->description }}</p>
        </div>
        <div class="card-footer">
            <span class="d-block" style="float:left">{{ $gift->price }} $</span>
            @if(isset(session()->get('cart')[$gift->id]))
            <span class="d-block" style="float:right">x{{ session()->get('cart')[$gift->id]['quantity'] }} on cart</span>
            <br />
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('add.cart', $gift) }}" class="btn btn-success pull-right" style="float:right"><i class="fa fa-plus"></i></a>
                    <a href="{{ route('lower.quantity.cart', $gift) }}" class="btn btn-primary pull-right ml-1"><i class="fa fa-minus"></i></a>

                </div>
                <a href="{{ route('remove.cart', $gift) }}" class="btn btn-danger pull-right" style="float:right"><i class="fa fa-trash"></i></a>
            </div>
            @else
            <a href="{{ route('add.cart', $gift) }}" class="btn btn-success pull-right" style="float:right">Add to cart</a>
            @endif
        </div>
    </div>
</div>