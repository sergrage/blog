<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Requests\Users\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function edit(User $user)
    {
    	return view('admin.users.edit', compact('user'));
    }

    public function store (CreateRequest $request)
    {
    	$user = User::create([
            'name'  =>  $request['name'],
            'email' =>  $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index');
    }

    public function update(UpdateRequest $request, User $user)
    {
        // $this->validate($request, [
        //     'name'  => 'required|string|alpha_dash|max:255|min:6',
        //     'email' => 'required|string|email|max:255|unique:users,id,' . $user->id,
        //   ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
