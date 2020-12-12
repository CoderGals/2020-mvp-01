@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
           <a  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-1"></i>Create new list</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('lists.store') }}">
        @csrf
        <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="name" placeholder="Enter title">
  </div>
  
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
      </form>
      </div>
     
    </div>
  </div>
</div>