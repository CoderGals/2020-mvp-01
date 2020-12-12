@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <input class="form-control" id="search" placeholder="Type a keyword..." />
        </div>
   
        <div class="col-lg-6">
            <select class="form-control" id="category" aria-placeholder="Filter by category">
                @php
                $categories = App\Models\Category::all()
                @endphp
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12 mt-3">
            @include('layouts.success')
        </div>
    </div>
    <div class="row justify-content-center content">
        @foreach($gifts as $gift)
       @include('gift', $gift)
        @endforeach
        <div class="col-lg-12 mt-4">
            {!! $gifts->links("pagination::bootstrap-4") !!}
        </div>
    </div>
    <a href="{{ route('cart.index') }}" class="btn btn-primary btn-lg" style="position:fixed;top:92%;left:95%;z-index:999999999"><i class="fa fa-cart-plus"></i></a>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('input', function() {
            updateData()
        })
        $('#category').on('change', function() {
            updateData()
        })

        function updateData() {
            $value = $('#search').val();
            $category = $('#category').val();
            $.ajax({
                type: 'get',
                url: '{{URL::to("search")}}',
                data: {
                    'search': $value,
                    'category' : $category,
                },
                success: function(data) {
                    $('.content').html(data);
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    });
</script>