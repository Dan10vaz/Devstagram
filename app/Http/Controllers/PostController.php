<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // autenticamos el usuario para quemuestre el dashboard
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user //mandamos a la vista la variable
        ]);
    }

    public function create()
    {
        dd('creando posts');
        /* return view('posts.create'); */
    }
}
