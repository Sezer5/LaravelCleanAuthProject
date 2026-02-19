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
                            <a href="{{route('admin.articles.create')}}">
                                <button class="btn btn-dark btn-sm">
                                    <i class="fa-solid fa-plus"></i> Add Article
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                        <td>Keywords</td>
                        <td>Image</td>
                        <td>*</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>
                                @foreach ($article->keywords as $keyword)
                                    <span>{{$keyword->name}}</span><br>
                                @endforeach
                            </td>
                            <td><img src="{{asset($article->picture)}}" width="50"></td>
                            <td>
                                <a href="{{route('admin.articles.edit',$article->id)}}">
                                    <button class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-wrench"></i>
                                    </button>
                                </a>
                                <a href="#" onclick="deleteItem({{$article->id}})" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{$article->id}}" action="{{route('admin.articles.destroy',$article->id)}}" method="post">
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