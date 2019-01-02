@extends('layouts.global')

@section('title')
    Category List
@endsection

@section('pageTitle')
    Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{route('categories.index')}}">
                @csrf
                <div class="form-group form-inline">
                    <input type="text" name="categoryName" id="categoryName" class="form-control col-sm-7" placeholder="Search Category" value="{{Request::get('categoryName')}}">
                    &nbsp;
                    <input type="submit" value="Search" class="btn btn-lg btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-center">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th></th>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{{$category->id}}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{asset('storage/'.$category->image)}}" height="50px">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_by}}</td>
                            <td>
                                <a name="" id="" class="btn btn-lg btn-primary" href="{{route('categories.edit', ['id' => $category->id])}} " role="button">Edit</a>
                                <a name="" id="" class="btn btn-danger btn-lg" href="" role="button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colSpan="5">{{$categories->links()}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection