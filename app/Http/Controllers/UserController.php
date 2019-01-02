<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::paginate(5);
        $status = $request->get('status');
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            if ($status) {
                $user = User::where('email','LIKE',"%$filterKeyword%")->where('status',$status)->paginate(2);
            }else{
                $user = User::where('email','LIKE',"$filterKeyword")->paginate(2);
            }
        }else{
            if($status){
                $user = User::where('status',$status)->paginate(2);
            }
        }
        
        return view('users.index',['users'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_user = new User;

        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->email = $request->get('email');
        $new_user->roles = json_encode($request->get('roles'));
        $new_user->phone = $request->get('phone');
        $new_user->address = $request->get('address');

        if ($request->file('avatar')) { 
            $file = $request->file('avatar')->store('avatar','public');

            $new_user->avatar = $file;
        }

        $new_user->save();
        return redirect()->route('users.create')->with('status','User Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->status = $request->get('status');
        $user->name = $request->get('name');
        $user->password = \Hash::make($request->get('password'));
        $user->roles = json_encode($request->get('roles'));
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');

        if ($request->get('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/'.$user->avatar))) {
                \Storage::delete(['public/',$user->avatar]);
            }
            $file = $request->get('avatar')->store('avatar','public');
            $user->avatar = $file;
        }

        $user->save();

        return redirect()->route('users.edit', ['id'=>$id])->with('status','User has been Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users.index')->with('status','User has been Deleted.');
    }
}
