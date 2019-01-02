{{-- @extends('layouts.app') --}}
@extends('layouts.global')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            
            @section('title')
                Home
            @endsection

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageTitle')
    Home
@endsection
