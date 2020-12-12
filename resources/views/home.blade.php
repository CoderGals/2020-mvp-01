@extends('layouts.app')

@section('content')

@include('home.header')
<!--HERO SECTION END-->

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-lg-12">
            <hr style="border: 1px solid lightcoral;" />
            <h3 class="w-100 m-auto text-center" style="color:red">FILTER</h3>
        </div>
        <div class="col-lg-4 pt-0">
            <label>Search by keyword</label>
            <input class="form-control pt-0 mt-0" id="search" placeholder="Type a keyword..." style="border:1px solid lightcoral" />
        </div>

        <div class="col-lg-4 pt-0">
        <label>Filter by category</label>

            <select class="form-control pt-0 mt-0" id="category" aria-placeholder="Filter by category" style="border:1px solid lightcoral">
                @php
                $categories = App\Models\Category::all()
                @endphp
                <option selected disabled>Filter by category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 pt-0">
        <label>Filter by celebration</label>

            <select class="form-control pt-0 mt-0" id="celebration" aria-placeholder="Filter by category" style="border:1px solid lightcoral">
                @php
                $categories = App\Models\Celebration::all()
                @endphp
                <option selected disabled>Filter by celebration</option>

                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <hr style="border: 1px solid lightcoral;" />

        </div>
        <div class="col-lg-12 mt-3">

            @include('layouts.success')
        </div>
    </div>
    <div class="row content">
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
            updateCelebrations()
        })

        function updateCelebrations() {
            $category = $('#category').val();
            $.ajax({
                type: 'get',
                url: '/celebration/' + $category,
                success: function(data) {
                    
                    $celebs =  $('#celebration');
                    $celebs.empty();
                    $celebs.append('<option selected disabled>FIlter by celebration</option>');
                    for(celeb in data) {
                        console.log(celeb, data)
                        $celebs.append(`<option value=${data[celeb].id}>${data[celeb].name}</option>`);

                    }
                }
            });
        }

        function updateData() {
            $value = $('#search').val();
            $category = $('#category').val();
            $.ajax({
                type: 'get',
                url: '{{URL::to("search")}}',
                data: {
                    'search': $value,
                    'category': $category,
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