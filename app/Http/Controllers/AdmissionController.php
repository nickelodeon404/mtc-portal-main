<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Strand;
use App\Models\Admission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;




class AdmissionController extends Controller
{

    public function index()
    {
        //$Admission = Admission::all(); //Admission in Admission::all(); -> is the model name from models folder.
        $data = DB::table('admission')->orderBy('id')->get();
        // $Users = User::all();
        // Fetch data for Enrollment section as well
        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get();

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get();

        return view('registrar.index', [
            'data' => $data,
            'enrollmentData' => $enrollmentData,
            'enrolledData' => $enrolledData,
            'users' => $Users,
        ])->with('Admission', $Admission);
    }


    public function create()
    {
        return view('admissions.index'); //index is located at admissions -> its the folder name/"index.blade.php" -> its the index in admissions.index
    }


    public function store(Request $request)
    {
        // $validatedData = $request->all();
        // dd($request); //all field that exist in a table no need to one by one.
        $validatedData = $request->validate([
            "lrn" => "required",
            "first_name" => "required",
            "middle_name" => "required",
            "last_name" => "required",
            "extension" => "nullable",
            "birthday" => "required",
            "age" => "required",
            "mobile_number" => "required",
            "email" => "required|email",
            "facebook" => "nullable",
            "barangay" => "required",
            "city_municipality" => "required",
            "province" => "required",
            "year_graduated" => "required",
            "junior_high" => "required",
            "graduation_type" => "required",
            "strand" => "required",
            "confirmationCheck" => "required",
        ]);

        /*   // Generate and send OTP using Semaphore.co API
           $otp = mt_rand(1000, 9999); // Generate a random 4-digit OTP
           $response = Http::post('https://api.semaphore.co/api/v4/otp', [
               'number' => $validatedData['mobile_number'],
               'otp' => $otp,
               'api_key' => 'ba7fdf3b96f281f479dce941fbeddf1b',
           ]);
       */

        // Store the uploaded PSA image in the 'public/images' directory
        if ($request->hasFile('psa')) {
            $psaPath = $request->file('psa')->store('images', 'public');
            $validatedData['psa'] = $psaPath;
        }

        // Store the uploaded Form 138 image in the 'public/images' directory
        if ($request->hasFile('form_138')) {
            $form138Path = $request->file('form_138')->store('images', 'public');
            $validatedData['form_138'] = $form138Path;
        }
        // dd($validatedData['first_name']);
        $firstThreeLetters = substr(str_replace(' ', '', $validatedData['first_name']), 0, 3);
        $randomPassword = rand(100000, 999999);
        $user = User::create([
            'role_id' => 3,

            'strands_id' => [
                              "ABM" => 1,
                              "GAS" => 2,
                              "HUMSS" => 3,
                              "STEM" => 4,
                              "TVL-ICT" => 5,
                              "TVL-HE" => 6,
                              "Arts & Design" => 7,
                            ] 
                              [$validatedData['strand']
                            ],

            'name' => $validatedData['last_name'] . $validatedData['first_name'],
            'email' => $validatedData['last_name'] . $firstThreeLetters . $randomPassword . "@example.com",
            'password' => Hash::make($randomPassword),
            // Hash the password
        ]);
        // Fetch the valid options for "strand" from the database
        $strands = Strand::all(); // Assuming "Strand" is the model for the "strands" table

        // $admission = Admission::create($validatedData);
        Admission::create([
            "users_id" => $user->id,
            "lrn" => $validatedData['lrn'],
            "first_name" => $validatedData['first_name'],
            "middle_name" => $validatedData['middle_name'],
            "last_name" => $validatedData['last_name'],
            "extension" => $validatedData['extension'],
            "birthday" => $validatedData['birthday'],
            "age" => $validatedData['age'],
            "mobile_number" => $validatedData['mobile_number'],
            "email" => $validatedData['email'],
            "facebook" => $validatedData['facebook'],
            "barangay" => $validatedData['barangay'],
            "city_municipality" => $validatedData['city_municipality'],
            "province" => $validatedData['province'],
            "year_graduated" => $validatedData['year_graduated'],
            "junior_high" => $validatedData['junior_high'],
            "graduation_type" => $validatedData['graduation_type'],
            "strand" => $validatedData['strand'],
            "confirmationCheck" => $validatedData['confirmationCheck'],
            // Hash the password
        ]);

        return redirect()->back()->with('success', 'Admission form submitted successfully');
    }
    // Optionally, you can redirect to a success page or perform additional actions

    /*       if ($response->successful()) {
           // OTP sent successfully
           // Save admission data to the database
           // ...

           return redirect()->back()->with('success', 'Admission form submitted successfully');
       } else {
           // Handle OTP sending failure
           return redirect()->back()->with('error', 'Failed to send OTP. Please try again.');
       }

       } 
   */


    public function show(string $id)
    {
        // Fetch data for editing using a Model
        // $item = YourModelName::findOrFail($id);

        // or, fetch data for editing using query builder
        $item = DB::table('admission')->where('id', $id)->first();

        return view('/registrar/show', ['item' => $item]); //'show' in the code is the edit.blade.php.
    }


    public function view()
    {
        $data = DB::table('admission')->orderBy('id')->get()->toArray(); //ordered by strand alphabetically

        $enrollmentData = DB::table('enrollment')->orderBy('grade_level')->get()->toArray(); //ordered by strand alphabetically

        $enrolledData = DB::table('enrolled')->orderBy('grade_level')->get()->toArray();

        return view('registrar.view', ['data' => $data, 'enrollmentData' => $enrollmentData, 'enrolledData' => $enrolledData]);
    }



    public function edit($id)
    {

    }


    public function destroy($id)
    {
        $admission = Admission::find($id);

        if (!$admission) {
            // Handle the case where admission is not found, return a response, etc.
        }

        // Perform the deletion logic, for example:
        $admission->delete();

        // Optionally, redirect to a different route after successful deletion.
        return redirect('/view-table');
    }

    /* 
          // Method to send OTP
       public function sendOTP(Request $request)
       {
           $mobileNumber = $request->input('mobile_number');

           // Generate a random OTP (you can implement your own OTP generation logic)
           $otp = rand(1000, 9999);

           // Send OTP using Semaphore.co API
           $response = Http::post('https://api.semaphore.co/api/v4/otp', [
               'api_key' => 'ba7fdf3b96f281f479dce941fbeddf1b',
               'phone_number' => $mobileNumber,
               'otp_code' => $otp,
           ]);

           // Check if OTP was sent successfully and store the mobile number for verification
           if ($response->successful()) {
               return view('admissions.index', ['mobileNumber' => $mobileNumber]);
           } else {
               return back()->withErrors(['otp_send_error' => 'Failed to send OTP']);
           }
       }

       // Method to verify OTP
       public function verifyOTP(Request $request)
       {
           $otp = $request->input('otp');
           $mobileNumber = $request->input('mobile_number');

           // Verify OTP using Semaphore.co API
           $response = Http::post('https://api.semaphore.co/api/v4/otp', [
               'api_key' => 'ba7fdf3b96f281f479dce941fbeddf1b',
               'phone_number' => $mobileNumber,
               'otp_code' => $otp,
           ]);

           // Check if OTP verification was successful
           if ($response->successful()) {
               // OTP is valid, continue with your application logic
               return redirect()->route('your.success.route');
           } else {
               // Invalid OTP, display an error message
               return back()->withErrors(['otp_verification_error' => 'Invalid OTP']);
           }
       }
   */
}