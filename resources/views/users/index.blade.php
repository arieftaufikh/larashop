@extends('layouts.global')

@section('title')
    User List
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{session('status')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <form action="{{route('users.index')}}">
                <div class="form-group form-inline">
                    <input type="text" class="form-control col-sm-7" name="keyword" id="keyword" placeholder="Search by Email" value="{{Request::get('keyword')}}">
                    &nbsp;
                    <input type="radio" name="status" id="active" class="form-control" value="ACTIVE" {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}}>
                    <label for="active">Active</label>

                    <input type="radio" name="status" id="inactive" class="form-control" value="INACTIVE" {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}}>
                    <label for="inactive">Inactive</label>
                    <input type="submit" value="Filter" class="btn btn-info col-sm-auto">
                </div>
            </form>  
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Avatar</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a class="btn btn-sm btn-block btn-success" href="{{route('users.show',['id'=>$user->id])}}" role="button">Detail</a>
                        </td>
                        <td class="text-center">
                            {{$user->id}}
                        </td>
                        <td class="text-center">
                            @if ($user->avatar)
                                <img src="{{asset('storage/'.$user->avatar)}}" height="100px">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->status == 'ACTIVE')
                                <span class="badge badge-primary">{{$user->status}}</span>
                            @else
                                <span class="badge badge-warning">{{$user->status}}</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-block btn-primary" href="{{route('users.edit',['id'=>$user->id])}}">Edit</a>
                            <br>
                            <form action="{{route('users.destroy',['id'=>$user->id])}}" method="POST" onsubmit="return confirm('Are you sure want to delete ?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="DELETE" class="btn btn-block btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=7>
                        {{$users->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection