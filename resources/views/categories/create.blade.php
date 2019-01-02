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
        
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.store')}}" method="post">
            @csrf
    
            <div class="form-group col-lg-6">
              <label for="category">Category</label>
              <input type="text" class="form-control" name="categoryName" id="category" placeholder="Enter Category Name">
            </div>

            <div class="form-group col-lg-6">
              <label for="categoryImage">Category Image</label><br>
              <input type="file" class="form-control" name="categoryImage" id="categoryImage">
            </div>

            <div class="form-group col-lg-6">
              <input type="submit" class="btn btn-lg btn-primary" name="submit" id="submit" value="Add Category">
            </div>
        </form>
    </div>
@endsection 

@section('pageTitle')
    Add New Category
@endsection