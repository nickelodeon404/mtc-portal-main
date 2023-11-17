<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Admitted;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdmittedController extends Controller
{
    public function index()
    {
        $data = DB::table('admission')->orderBy('id')->get();

        $admitted = DB::table('admitted')->orderBy('id')->get()->toArray();

        // Fetch data for Enrollment section as well
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get();

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get();

        return view('registrar.index', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData, 'admitted' => $admitted]);

    }

    public function create()
    {
        return view('admissions.index'); //index is located at admissions -> its the folder name/"index.blade.php" -> its the index in admissions.index
    }

    public function store(Request $request)
    {
    	$validatedData = $request->all();

    	$admitted = Admitted::create($validatedData);

    	// Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your admit was submitted!!');
    }

    public function show(string $id)
    {

    }

    public function view()
    {
        $admitted = DB::table('admitted')->orderBy('id')->get()->toArray();

        $data = DB::table('admission')->orderBy('id')->get()->toArray();//ordered by strand alphabetically

        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray();//ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        return view('registrar.admitted_table', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData, 'admitted' => $admitted]);
    }

//Edit the data
   public function update(Request $request, string $id): RedirectResponse
   {
       $validatedData = $request->all();
   
       $admitted = Admitted::find($id);
   
       if (!$admitted) {
           return redirect()->back()->with('error', 'Admitted User not found.');
       }
   
       $admitted->update($validatedData);
   
       return redirect()->back()->with('success', 'User Information updated successfully.');
   }

    public function destroy($id)
    {
        $admitted = Admitted::find($id);

        if (!$admitted) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $admitted->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/admitted_table-table');
    }
}
