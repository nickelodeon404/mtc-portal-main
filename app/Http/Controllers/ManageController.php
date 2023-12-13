<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Admitted;
use App\Models\Admission;
use App\Models\ActivityLog;
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


   //Edit the data
   public function update(Request $request, string $id): RedirectResponse
   {
        $validatedData = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            // 'confirmed' checks if 'password' and 'password_confirmation' match
        ]);
   
       $user = User::find($id);
   
       if (!$user) {
           return redirect()->back()->with('error', 'User not found.');
       }

        // Log the activity
        ActivityLog::create([
            'user_id' => auth()->user()->role_id,
            // Assuming you have authentication set up
            'action' => 'user_updated',
            'details' => 'User data updated',
        ]);
   
       $user->update($validatedData);
   
       return redirect()->back()->with('success', 'User data updated successfully.');
   }

   public function destroy($id)
   {
       $user = User::find($id);

       if (!$user) {
           // Handle the case where user is not found, return a response, etc.
       }

        ActivityLog::create([
            'user_id' => auth()->user()->role_id,
            // Assuming you have authentication set up
            'action' => 'user_deleted',
            'details' => 'User data deleted',
        ]);

       // Check if there are related records in the 'admitted' table
       $relatedAdmissions = Admission::where('users_id', $id)->get();

       if ($relatedAdmissions->isNotEmpty()) {
           // If there are related admissions, you might want to delete them or handle accordingly
           // For example, you can delete them:
           Admission::where('users_id', $id)->delete();
           
           // Alternatively, you might want to update the 'users_id' to null or a default user:
           // Admitted::where('users_id', $id)->update(['users_id' => null]);

           // Now you can safely delete the user
           $user->delete();

           return redirect('/manage-table')->with('success', 'User and related admissions deleted successfully.');
       }

       $relatedAdmitted = Admitted::where('users_id', $id)->get();

       if ($relatedAdmitted->isNotEmpty()) {
           // If there are related admissions, you might want to delete them or handle accordingly
           // For example, you can delete them:
           Admitted::where('users_id', $id)->delete();
           
           // Alternatively, you might want to update the 'users_id' to null or a default user:
           // Admitted::where('users_id', $id)->update(['users_id' => null]);

           // Now you can safely delete the user
           $user->delete();

           return redirect('/manage-table')->with('success', 'User and related admissions deleted successfully.');
       }

       // If there are no related admissions, you can safely delete the user
       $user->delete();

       // Optionally, redirect to a different route after successful deletion.
       return redirect('/manage-table')->with('success', 'User deleted successfully.');
   }
}
