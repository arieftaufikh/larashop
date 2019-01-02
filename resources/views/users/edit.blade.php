@extends('layouts.global')

@section('title')
    Edit User
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
    @endif

    <a name="btnBack" id="btnBack" class="btn btn-lg btn-info" href="/users/" role="button">Back</a>
    <br><br>

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update',['id'=>$user->id])}}" method="post">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="{{$user->email}}" disabled>
        </div>

        <div class="form-group form-check-inline">
            <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status">
            <label for="active">Active</label>
        </div>

        <div class="form-group form-check-inline">
            <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
            <label for="inactive">Inactive</label>
        </div>

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="{{$user->username}}" disabled>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-enter Password">
        </div>

        <label>Roles</label>
        <br>
        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN" {{in_array("ADMIN",json_decode($user->roles)) ? "checked" : ""}}>
        <label for="ADMIN">Admin &nbsp;</label>

        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="STAFF">Staff &nbsp;</label>

        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="CUSTOMER">Customer</label>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" value="{{$user->phone}}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" rows="4">{{$user->address}}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <div class="form-inline">
                @if ($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" height="150px">
                @else
                    No Avatar
                @endif
                <input type="file" class="form-control" name="avatar" id="avatar" placeholder="Chose File">
            </div>
        </div>
        
        <input name="submit" id="submit" class="btn btn-lg btn-success" type="submit" value="Update">
    </form>
@endsection

@section('pageTitle')
    Edit User
@endsection