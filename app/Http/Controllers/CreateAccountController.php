<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


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
        try {
            $validatedData = $request->validate([
                "name" => "required",
                "role_id" => "required",
                "email" => "required|unique:users,email", // Unique rule to check if email is unique
                "password" => "required",
            ]);

            // Fetch roles again from the database if needed

            User::create([
                "name" => $validatedData['name'],
                "role_id" => $validatedData['role_id'],
                "email" => $validatedData['email'],
                "password" => $validatedData['password'],
            ]);

            return redirect()->back()->with('success', 'Success!! Account was Created!!');
        } catch (ValidationException $e) {
            // If the validation fails due to a duplicate username
            return redirect()->back()->withErrors($e->errors())->withInput()->with('error', 'The username is already exist. Please try another username.');
        } catch (\Exception $e) {
            // Other exceptions
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }
}
