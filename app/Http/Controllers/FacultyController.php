<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index()
    {
        $userInfo = DB::table('users')->orderBy('id')->get();
       // $roles = Roles::orderBy('id')->get();

        return view('faculty.index', ['userInfo' => $userInfo]);

    }

    public function store(Request $request)
    {
    	$validatedData = $request->all();

    	$userInfo = User::create($validatedData);

    	// Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your admit was submitted!!');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->all();
    
        $userInfo = User::find($id);
    
        if (!$userInfo) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $userInfo->update($validatedData);
    
        return redirect()->back()->with('success', 'User Information updated successfully.');
    }
}
