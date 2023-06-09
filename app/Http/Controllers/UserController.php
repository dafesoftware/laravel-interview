<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function  store(UserRequest $request)
    {   $request->validated();
        $userData=[
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ];

        $user=User::create($userData);
    return redirect()->back()->with('success', 'user created successfully.');



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return view('form',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('form',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        return view('users.form',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return back()->with('success',"User deleted successfully");
    }
}
