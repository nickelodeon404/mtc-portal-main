<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role_id = auth()->user()->role_id;

        $redirects = [
            1 => '/faculty',
            2 => '/registrar',
            3 => '/student',
        ];

        if (isset($redirects[$role_id])) {
            return redirect($redirects[$role_id]);
        } else {
            return redirect('/home');
        }
    }
}
