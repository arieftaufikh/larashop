@extends('layouts.global')

@section('title')
    Create User
@endsection

@section('content')
    <div class="col-md-12">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
        @endif

        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="example@larshop.test" required>
            </div>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-enter Password" required>
            </div>

            <label>Roles</label>
            <br>
            <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
            <label for="ADMIN">Admin &nbsp;</label>

            <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
            <label for="STAFF">Staff &nbsp;</label>

            <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
            <label for="CUSTOMER">Customer</label>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control-file" name="avatar" id="avatar" placeholder="Chose File">
            </div>
            
            <input name="submit" id="submit" class="btn btn-lg btn-success" type="submit" value="Submit">

        </form>
    </div>
@endsection

@section('pageTitle')
    Create New User
@endsection