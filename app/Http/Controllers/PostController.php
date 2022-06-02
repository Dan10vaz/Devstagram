<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // autenticamos el usuario para quemuestre el dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }
}
