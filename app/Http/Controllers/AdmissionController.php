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

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;
//use GuzzleHttp\Client;




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
         //   'psa' => 'nullable|file|mimes:jpeg,jpg,png|max:2048', // Validate as a file with a max size of 2048 KB.
         //   'form_138' => 'nullable|mimes:jpeg,jpg,png|max:2048', // Validate as a file with a max size of 2048 KB.
        ]);

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
        $LastName = $validatedData['last_name'];
        $firstThreeLetters = substr(str_replace(' ', '', $validatedData['first_name']), 0, 3);
        $randomPassword = rand(100000, 999999);
        $user = User::create([
            'role_id' => 3,
/*
<<<<<<< Updated upstream
Causing the Error!!
=======
>>>>>>> Stashed changes
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
*/
            'name' => $validatedData['last_name'] . $validatedData['first_name'],
            'email' => $validatedData['last_name'] . $firstThreeLetters ,
            'password' => Hash::make($randomPassword),
            // Hash the password
        ]);
        // Fetch the valid options for "strand" from the database
        $strands = Strand::all(); // Assuming "Strand" is the model for the "strands" table
        $this->sendSmsWithUserIdAndPassword($LastName, $firstThreeLetters, $randomPassword, $validatedData['mobile_number']);

//OTP CREATE VERIFICATION

        // Get credentials from .env 
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verifications
        ->create($validatedData['mobile_number'], "sms");
        //->create($validatedData['verification_code'], array('to' => $validatedData['mobile_number'], "sms"));

//END OF OTP CREATE VERIFICATION

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

        return redirect()->route('verify')->with(['mobile_number' => $validatedData['mobile_number']]); //this is from otp.
        //return redirect()->back()->with('success', 'Admission form submitted successfully');
    }
    protected function sendSmsWithUserIdAndPassword($LastName, $firstThreeLetters, $password, $mobileNumber)
    {
        // Get Twilio credentials from .env
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        // Initialize Twilio client
        $twilio = new Client($twilioSid, $twilioAuthToken);

        // Compose the SMS message
        $messageBody = "Your Username: $LastName$firstThreeLetters\nYour Password: $password";

        // Send SMS
        $twilio->messages->create(
            $mobileNumber,
            [
                'from' => $twilioPhoneNumber,
                'body' => $messageBody,
            ]
        );
    }

// OTP VERIFY DATA
    protected function verify(Request $request)
    {
        $validatedData = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'mobile_number' => ['required', 'string'],
        ]);
        // Get credentials from .env
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create([
                'to' => $validatedData['mobile_number'],
                'code' => $validatedData['verification_code'],
            ]);
        if ($verification->valid) {
            $admission = tap(Admission::where('mobile_number', $validatedData['mobile_number']))->update(['isVerified' => true]);
            // Authenticate user 
            //User::login($admission->first());
            return redirect()->route('index')->with(['success' => 'mobile number verified']);
        }
        return back()->with(['mobile_number' => $validatedData['mobile_number'], 'error' => 'Invalid verification code entered!']);
    }
//END OF OTP VERIFY DATA


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
}