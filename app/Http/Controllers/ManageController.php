<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->orderBy('id')->get();

        return view('registrar.index', ['user' => $user]);
    }

    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        $item = DB::table('users')->where('id', $id)->first();

        return view('/registrar/manage', ['item' => $item]); //'show' in the code is the show.blade.php.
    }

    public function view()
    {
        $user = DB::table('users')->orderBy('id')->get();

        return view('registrar.manage', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $user->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/manage-table');
    }
}
