<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    public function index()
    {
        $userInfo1 = DB::table('users')->orderBy('id')->get();
       // $roles = Roles::orderBy('id')->get();

        //return view('faculty.index', ['userInfo' => $userInfo]);

    }

    public function store(Request $request)
    {
    	$validatedData = $request->all();

    	$userInfo1 = User::create($validatedData);

    	// Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your admit was submitted!!');
    }

    public function RegistrarUpdate(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->all();
    
        $userInfo1 = User::find($id);
    
        if (!$userInfo1) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $userInfo1->update($validatedData);
    
        return redirect()->back()->with('success', 'User Information updated successfully.');
    }
}
