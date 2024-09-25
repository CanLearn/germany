<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name ;
        $users->email = $request->email ;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->route('panel.users.index');
    }

    public function edit( $userId)
    {
        $users = User::query()->findOrFail($userId);
        return view('admin.users.edit' , compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $userId)
    {
       User::query()->where('id' , $userId)->update([
           'name' => $request->name ,
           'email' => $request->email,
           'password' => Hash::make($request->password)
       ]);
        return redirect()->route('panel.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $userId)
    {
        User::query()->where('id' , $userId)->delete();
        return redirect()->route('panel.users.index');
    }
}
