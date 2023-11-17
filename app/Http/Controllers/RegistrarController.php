<?php
/*
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    public function index()
    {
        $role_id = 2;
        $registrarUsers = DB::table('users')->where('role_id', $role_id)->get();

        return view('registrar.index', ['registrarUsers' => $registrarUsers]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->all();
        $registrarUser = User::create($validatedData);

        // Optionally, you can redirect to a success page or perform additional actions
        return redirect()->back()->with('success', 'Success!! Your admit was submitted!!');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->all();
        $registrarUser = User::find($id);

        if (!$registrarUser) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $registrarUser->update($validatedData);

        return redirect()->back()->with('success', 'User Information updated successfully.');
    }
}
*/
