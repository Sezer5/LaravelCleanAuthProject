@extends('admin.layouts.App')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="col-md-10 col-lg-10">
    <div class="col-md-4 col-lg-4 m-3">
        <form action="{{route('admin.keywords.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter a name">
            </div>
            <div class="form-group my-2 text-right">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection