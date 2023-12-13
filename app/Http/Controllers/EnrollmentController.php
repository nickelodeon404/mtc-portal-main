<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Admitted;
use App\Models\Enrolled;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    public function index()
    {
        $data = DB::table('admission')->orderBy('id')->get();
        // $Users = User::all();
        // Fetch data for Enrollment section as well
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get();

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get();

        return view('registrar.index', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);

    }

    public function create()
    {
        return view('/student/enrollment.index'); //index is located at students -> its the folder name/"index.blade.php" -> its the index in /students/enrolment.index
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lrn' => 'required',
            'strand' => 'required',
            'email' => 'required',
            'first_name' => 'required|max:50',
            'middle_name' => 'nullable|max:50',
            'last_name' => 'required|max:50',
            'extension' => 'nullable|max:5',
            'birthday' => 'required|date',
            // 'age' => 'required|integer',
            'mobile_number' => 'required|string',
            'emergency_number' => 'required|string',
            'facebook' => 'nullable',
            'region' => 'required',
            'provinces' => 'required',
            'barangay' => 'required',
            'municipalities' => 'required',
            'status' => 'required',
            'grade_level' => 'required',
            'junior_high' => 'required',
            'graduation_type' => 'required',

        ]);

        $enrollment = Enrollment::create($validatedData);

        // Log the activity for enrollment creation
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'enrollment_created',
            'details' => 'Enrollment created for user: ' . $enrollment->first_name . ' ' . $enrollment->last_name,
        ]);

        // Optionally, you can redirect to a success page or perform additional actions

        return redirect()->back()->with('success', 'Success!! Your enrollment was submitted!!');
    }

    public function edit(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        $item = DB::table('enrollment')->where('id', $id)->first();

        return view('/registrar/enrollment_table', ['item' => $item]); //'show' in the code is the show.blade.php.
    }
    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder

        //$item = DB::table('enrollment')->where('id', $id)->first();

        //return view('/registrar/show_enrollment', ['item' => $item]); //'show' in the code is the show.blade.php.
    }
    public function view()
    {
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray();//ordered by strand alphabetically

        $data = DB::table('admission')->orderBy('id')->get()->toArray();//ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        return view('registrar.enrollment_table', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);
    }


//Add to Enrolled
    public function addToEnrolled(Request $request, $id)
    {
        try {
            // Fetch the enrollment data using the provided $id
            $enrollment = Enrollment::findOrFail($id);

            // Fetch the selected section from the form
            $selectedSection = request('section');

        // Check if the section is not selected
        if (!$request->has('section') || $request->input('section') === null) {
            return redirect()->back()->with('error', 'Please select a section.');
        }

            // Log the data to check if it's being fetched correctly
            Log::info('Enrollment Data: ' . json_encode($enrollment));

            // Find or create the enrolled record based on LRN
            $enrolled = Enrolled::updateOrCreate(
                ['lrn' => $enrollment->lrn],
                [
                    'strand' => request('strand'),
                    'email' => request('email'),
                    'first_name' => request('first_name'),
                    'middle_name' => request('middle_name'),
                    'last_name' => request('last_name'),
                    'extension' => request('extension'),
                    'birthday' => request('birthday'),
                    // 'age' => request('age'),
                    'mobile_number' => request('mobile_number'),
                    'emergency_number' => request('emergency_number'),
                    'facebook' => request('facebook'),
                    'region' => request('region'),
                    'provinces' => request('provinces'),
                    'barangay' => request('barangay'),
                    'municipalities' => request('municipalities'),
                    'status' => request('status'),
                    'grade_level' => request('grade_level'),
                    'section' => $selectedSection,
                    'junior_high' => request('junior_high'),
                    'graduation_type' => request('graduation_type'),
                ]
            );


            // Log a success message to check if data insertion/update is successful
            Log::info('Data successfully inserted/updated in Enrolled table');

            // Delete the data from the enrollment table
            $enrollment->delete();

            // Log a success message to check if data deletion is successful
            Log::info('Data successfully deleted from Enrollment table');

            // Log the activity for adding to enrolled
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'action' => 'added_to_enrolled',
                'details' => 'Student added to enrolled: ' . $enrolled->first_name . ' ' . $enrolled->last_name,
            ]);

            return redirect()->back()->with('success', 'Student added/updated in enrolled successfully.');
        } catch (\Exception $e) {
            // Dump and die with the exception message for debugging
            dd($e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while transferring the student to enrolled.');
        }
    }



    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $enrollment->delete();

        // Log the activity for enrollment deletion
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'action' => 'enrollment_deleted',
            'details' => 'Enrollment deleted: ' . $enrollment->first_name . ' ' . $enrollment->last_name,
        ]);

        // Optionally, redirect to a different route after successful deletion.
        return redirect()->back()->with('success', 'Student data deleted successfully.');
    }

    public function studentIndex(){
        $userid = auth()->user()->id;
        // dd(Admission::where("users_id", "=", $userid)->first());
        return view("students.enrollment.index", [
            "admitted" => Admitted::where("users_id", "=", $userid)->first()
        ]);
    }

    //Edit the data
    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->all();

        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            return redirect()->back()->with('error', 'Enrollment not found.');
        }

        $enrollment->update($validatedData);

        return redirect('/enrollment_table-table')->with('success', 'Enrollment data updated successfully.');
    }



}