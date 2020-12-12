@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center content">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('store.favourites', $gift)}}">
                @csrf

                <div class="form-group">
                    <label for="title">Select the list you want to put this gift in</label>
                    <select class="form-control" name="list_id">
                        @foreach($lists as $list)
                        <option value="{{ $list->id }}">
                            {{$list->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection