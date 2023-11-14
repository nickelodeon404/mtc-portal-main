<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;


class CreateAccountController extends Controller
{
    public function index()
    {
        $createAccount = DB::table('users')->orderBy('id')->get();
       // $roles = Roles::orderBy('id')->get();

        return view('registrar.index', ['createAccount' => $createAccount]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "role_id" => "required",
            "email" => "required",
            "password" => "required",
        ]);
    
        // Fetch roles again from the database
    
        User::create([
            "name" => $validatedData['name'],
            "role_id" => $validatedData['role_id'],
            "email" => $validatedData['email'],
            "password" => $validatedData['password'],
        ]);
    
        return redirect()->back()->with('success', 'Success!! Account was Created!!');
    }
}
