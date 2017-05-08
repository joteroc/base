<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::orderBy('name','ASC')->paginate(5);
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        if(strcasecmp($request->password, $request->retry_password) != 0){
            flash('The password must be the same')->error();
            return view('admin.users.create');
        }else{
            try {
                $user->password=bcrypt($request->password);
                $save_response = $user->save();
                flash('The user '.$user->name.' was created')->success();
                return redirect()->route('users.index');
            } catch (\Illuminate\Database\QueryException $e) {
                flash('Check if Id and Email already exists or contact with your administrator because something happens while saving the data')->error();
                return view('admin.users.create');
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $user = User::find($request->id);
        return view('admin.users.update')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        $user = User::find($id);

        $user->fill($request->all());
        /*
        the previous line replace the following code.
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type=$request->type;
        */
        $user->save();
        flash('The user '.$user->name.' was updated')->success()->important();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $user = User::find($request->id);
        $user->delete();
        flash('The user '.$user->name.' was deleted')->error()->important();
        return redirect()->route('users.index');
    }
}
