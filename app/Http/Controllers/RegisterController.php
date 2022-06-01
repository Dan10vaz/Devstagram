<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:6|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('posts.index');
    }
}
