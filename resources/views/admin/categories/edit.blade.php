@extends('admin.layouts.App')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="col-md-10 col-lg-10">
    <div class="col-md-4 col-lg-4 m-3">
        <form action="{{route('admin.categories.update',$category->slug)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group my-2 text-right">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-refresh"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection