@extends('layouts.global')

@section('title')
    User Details
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    {{-- <img src="{{asset('storage/'.$user->avatar)}}" class="img-thumbnail">     --}}
                    @if ($user->avatar)
                        <img src="{{asset('storage/'.$user->avatar)}}" class="img-thumbnail">
                    @else
                        <p>This user didn't have an Avatar</p>
                    @endif
                </div>
                <div class="col-9">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Id</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->id}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Status</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->status}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Name</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->name}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Username</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->username}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Email</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->email}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Roles</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">
                                    @foreach (json_decode($user->roles) as $role)
                                        &middot;&nbsp;{{$role}} <br>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Phone</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->phone}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-inline">
                                <div class="col-2"><b>Address</b></div>
                                <div class="col-1">:</div>
                                <div class="col-auto">{{$user->address}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                    <a name="backToCategory" id="backToCategory" class="btn btn-block btn-primary" href="/users/" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageTitle')
    User Details
@endsection