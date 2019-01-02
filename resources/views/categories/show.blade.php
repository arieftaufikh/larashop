@extends('layouts.global')

@section('title')
    {{$category->name}} Details
@endsection

@section('content')
    <div class="card">
        {{-- <img class="card-img-top" data-src=""> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    @if ($category->image)
                        <img class="img-thumbnail" src="{{asset('storage/'.$category->image)}}">
                    @else
                        N/A
                    @endif
                </div>
                <div class="col-9">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Id</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->id}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Name</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->name}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Slug</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->slug}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Created By</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->user->id}} ({{$category->user->email}})</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Created At</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->created_at}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Last Update at</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$category->updated_at}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <a name="backToCategory" id="backToCategory" class="btn btn-block btn-primary" href="/categories/" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection