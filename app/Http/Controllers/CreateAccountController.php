<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CreateAccountController extends Controller
{
    public function index()
    {
        $createAccount = DB::table('users')->orderBy('id')->get();

        return view('registrar.index', ['createAccount' => $createAccount]);

    }

    public function create()
    {
        return view('/registrar/manage'); //index is located at students -> its the folder name/"index.blade.php" -> its the index in /students/enrolment.index
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "role_id" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $users = User::create($validatedData);

        return redirect()->back()->with('success', 'Success!! Your enrollment was submitted!!');
    }
}
