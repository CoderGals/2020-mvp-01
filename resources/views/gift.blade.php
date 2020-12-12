<div class="col-md-2 mt-2 gift-box">
    <div class="">


        <div class="gift-box-body  wow fadeIn">
            <img class="w-100 h-auto" src="{{  $gift->pic_url }}" />
            <div class="gift-box-header mt-4 d-flex justify-content-between">
                <div class="name">{{ $gift->name }}</div>
                <a href="{{ route('add.favourites', $gift) }}"> <i class="fa fa-star" style="color:green"></i> </a>
            </div>
        </div>

        <p>{{ $gift->description }}</p>

        <div class="gift-box-footer">
            <span class="d-block" style="float:left">{{ $gift->price }} $</span>
            @if(isset(session()->get('cart')[$gift->id]))
            <span class="d-block" style="float:right">x{{ session()->get('cart')[$gift->id]['quantity'] }} on cart</span>
            <br />
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('add.cart', $gift) }}" class="btn btn-outline-success pull-right" style="float:right;padding: 14px;"><i class="fa fa-plus"></i></a>
                    <a href="{{ route('lower.quantity.cart', $gift) }}" class="btn btn-outline-primary pull-right ml-1" style="padding: 14px;"><i class="fa fa-minus"></i></a>
                </div>
                <a href="{{ route('remove.cart', $gift) }}" class="btn btn-outline-danger pull-right" style="float:right;padding: 14px;"><i class="fa fa-trash"></i></a>
            </div>
            @else
            <div>
                <a href="{{ route('add.cart', $gift) }}" class="btn btn-outline-success pull-right" style="float:right;padding: 14px;">Add to cart</a>
            </div>
            @endif
        </div>

    </div>
</div>