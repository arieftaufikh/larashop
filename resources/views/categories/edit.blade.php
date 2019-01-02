@extends('layouts.global')

@section('title')
    Add Category
@endsection

@section('content')
    <div class="col-lg-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
        @endif
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.update',['id'=> $category->id])}}" method="post">
            @csrf

            <input type="hidden" name="_method" value="PUT">
    
            <div class="form-group col-lg-4">
                <label for="category">Category</label>
                    <input type="text" class="form-control" name="categoryName" id="category" placeholder="Enter Category Name" value="{{$category->name}}" aria-describedby="slug" required>
                <small id="slug" class="form-text text-muted">{{$category->slug}}</small>
            </div>

            <div class="form-group col-lg-12">
                <label for="categoryImage">Category Image</label><br>
                <div class="form-inline">
                    @if ($category->image)
                        <img src="{{asset('storage/'.$category->image)}}" height="150px" class="bordered"">
                    @else
                        N/A
                    @endif
                    <input type="file" class="form-control" name="categoryImage" id="categoryImage" style="margin-left:20px">
                </div>
            </div>

            <div class="form-group col-lg-6">
                <input type="submit" class="btn btn-lg btn-info" name="submit" id="submit" value="Update">
            </div>
        </form>
    </div>
@endsection 

@section('pageTitle')
    Add New Category
@endsection