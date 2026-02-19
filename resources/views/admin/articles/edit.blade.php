@extends('admin.layouts.App')

@section('title')
    Dashboard
@endsection

@section('content')
<style>
    .dnone{
        display: none
    }
</style>
<div class="col-md-10 col-lg-10">
    <div class="col-md-4 col-lg-4 m-3">
        <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Title*</label>
                <input type="text" class="form-control" name="title" placeholder="Enter a title" value="{{$article->title,old('title')}}">
            </div>
            <div class="formElement">
                        @error('picture')
                            <span class="invalidMessage">{{$message}}</span>
                        @enderror
                        <span class="formElementName">First Image</span>
                        <input type="file" class="fromInput form-control" name="picture" id="picture">
                    </div>
                    <div class="formElement">
                       <img src="{{asset($article->picture)}}" alt="" id="picture_preview" class="@if(!$article->picture) dnone @endif"
                       height="100"
                       width="100"
                       >
                    </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Category*</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                                        <label for="keywords_id" class="form-label">Keywords*</label>
                                        <select class="form-control @error('keywords_id') is-invalid @enderror"
                                            name="keywords_id[]"
                                            id="keywords_id"
                                            multiple>

                                            @foreach ($keywords as $keyword)
                                                
                                                   <option value="{{$keyword->id}}" @if (collect(old('keywords_id'))->contains($keyword->id)) selected @endif>{{$keyword->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('keyword_id')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Description*</label>
                <textarea name="desc" class="form-control"></textarea>
            </div>
            <div class="form-group my-2 text-right">
                <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-plus"></i></button>
            </div>
        </form>
    </div>
</div>




<script>
        function handleImageInputChange(input,image) {
            document.getElementById(input).addEventListener('change',function(){
                readUrl(this,image)
            });
        }

        function readUrl(input,image)
        {
            if(input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(image).classList.remove('dnone');
                    document.getElementById(image).setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        handleImageInputChange('picture','picture_preview');
    </script>
@endsection