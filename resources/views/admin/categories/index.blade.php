@extends('admin.layouts.App')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="col-md-10 col-lg-10">
    <div class="col-md-9 col-lg-9 mx-3 my-3">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <td colspan="4">
                            <a href="{{route('admin.categories.create')}}">
                                <button class="btn btn-dark btn-sm">
                                    <i class="fa-solid fa-plus"></i> Add Category
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>*</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <a href="{{route('admin.categories.edit',$category->slug)}}">
                                    <button class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-wrench"></i>
                                    </button>
                                </a>
                                <a href="#" onclick="deleteItem({{$category->id}})" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{$category->id}}" action="{{route('admin.categories.destroy',$category->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    
</div>
@endsection