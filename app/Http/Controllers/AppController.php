<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class AppController extends Controller
{
    public function getDashboard()
    {
        if(Auth::user()) {
            return view('app.dashboard', ['title' => 'Dashboard']);
        } else {
            return Redirect::to('login');
        }
    }
}
