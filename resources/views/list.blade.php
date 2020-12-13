@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <form method="POST" action="{{ route('lists.store') }}">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="name" placeholder="Enter title">
        </div>
        <button  class="btn btn-primary" type="submit"><i class="fa fa-plus mr-1"></i>Create new list</button>
      </form>
    </div>
    <div class="col-lg-12 mt-3">
      @include('layouts.success')
    </div>
    @foreach($lists as $list)

    <div class="col-lg-12 mt-3">
      <div class="d-flex justify-content-between">
        <h3>{{ $list->name }}</h3>
        <a href="{{ route('lists.show', $list) }}" class="btn btn-primary"><i class="fa fa-eye mr-2"></i>Show</a>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection