<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrolledController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AdmittedController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\ActivityLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login1', function () {
    return view('login');
});

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::get('admission', function () {
    return view('admissions.index');
});

Route::get('academics', function () { //academics = blade name identifyer this is the one that input to the href
    return view('academics');          //academics = blade name
});


Route::get('login', function () {
    return view('login');
})->middleware('auth');


Route::get('dashboard', function () { //dashboard is a name that you can put into href"" it can be customize by the name you desired to use.. Its just like a variable name..
    return view('students.index'); //location of the blade index.blade
})->middleware('student');


// Route::get('student', function () {
//     return view('students.enrollment.index');
// })->middleware('student');
Route::get('student', [EnrollmentController::class, 'studentIndex'])->middleware('student');

Route::get('enrollment', function () {
    return view('students.enrollment.index');
})->middleware('student');

Route::get('academic', function () {
    return view('students.academic.index');
})->middleware('student');

Route::get('grades', [GradeController::class, 'studentGrade'])->middleware('student');

Route::get('faculty',[HomeController::class, 'faculty'])->middleware('faculty');

//ROUTE FOR FACULTY GRADE
Route::get('grade', [GradeController::class, 'facultyGrading'])->middleware('faculty');
Route::get('faculty/grade/subject/{subject}', [GradeController::class, 'facultyGrading'])->middleware('faculty')->name('faculty.grade.subject');
Route::post('faculty/grade/post', [GradeController::class, 'postGrade'])->middleware('faculty')->name('faculty.grade.post');
//END

Route::get('registrar', function () {
    return view('registrar.index');
})->middleware('registrar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// New Routes

// Route for Admission
Route::resource("/admissions", 'App\Http\Controllers\AdmissionController'::class); //admissions is the folder name

//Route::get('/admission/index', [AdmissionController::class, 'create']); //create is the class name in Admission Controller
Route::post('/admission', [AdmissionController::class, 'store']); //store is also the class name in Admission Controller and the admission is the table in database.
Route::post('/enrollment', [EnrollmentController::class, 'store']);

//This is Controller for CRUD in Admission - For Registrar Dashboard.
//'view-table','edit-table','update-table' is a default command in laravel that automatically find the specific table without hussle.
Route::get('/registrar', [AdmissionController::class, 'index']);
Route::get('/view-table', [AdmissionController::class, 'view']);
Route::get('/show-table{registrar}', [AdmissionController::class, 'show'])->name('admin.registrar.show');
//Route::post('/view-table/{id}', 'App\Http\Controllers\AdmissionController@admitStudent')->name('admitStudent');
Route::delete('/admission/{id}', [AdmissionController::class, 'destroy'])->name('admission.destroy');

//Route for Enrollment
Route::get('/registrar', [EnrollmentController::class, 'index']);
Route::get('/enrollment_table-table', [EnrollmentController::class, 'view']);
Route::get('/show_enrollment{registrar}', [EnrollmentController::class, 'show'])->name('enrollmment.registrar.show');//view enrollment data
Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');
/*Route for updating the student data in enrollment table*/
Route::get('/enrollment{id}', [EnrollmentController::class, 'edit'])
    ->name('enrollment.edit');

Route::patch('/enrollment{id}/update', [EnrollmentController::class, 'update'])
    ->name('enrollment.update');

//Route for Enrolled
Route::get('/registrar', [EnrolledController::class, 'index']);
Route::get('/enrolled_table-table', [EnrolledController::class, 'view']);
Route::get('/show_enrolled-table{registrar}', [EnrolledController::class, 'show'])->name('enrolled.registrar.show');
Route::post('/enrollment/{id}/add-to-enrolled', [EnrollmentController::class, 'addToEnrolled'])->name('enrollment.addToEnrolled');
Route::delete('/enrolled/{id}', [EnrolledController::class, 'destroy'])->name('enrolled.destroy');

//Route for Admitted
Route::get('/registrar', [AdmittedController::class, 'index']);
Route::get('/admitted_table-table', [AdmittedController::class, 'view']);
Route::post('/admission/{id}/add-to-admitted', [AdmissionController::class, 'admitStudent'])->name('admission.admitStudent');
Route::delete('/admitted/{id}', [AdmittedController::class, 'destroy'])->name('admitted.destroy');


//PDF EXPORTING
Route::get('/export_user_pdf', [EnrolledController::class, 'export_user_pdf'])->name('export_user_pdf'); //For Enrolled
Route::get('/export_grade_pdf', [GradeController::class, 'export_grade_pdf'])->name('export_grade_pdf');

//Route for Manage Account
Route::get('/registrar', [ManageController::class, 'index']);
Route::get('/manage-table', [ManageController::class, 'view']);
Route::delete('/users/{id}', [ManageController::class, 'destroy'])->name('users.destroy');
//Route For Create Account
Route::post('/users', [CreateAccountController::class, 'store']);
//Route For Update Account
Route::patch('/users/{id}', [ManageController::class, 'update'])
    ->name('users.update');
//Activity Log
Route::middleware(['auth', 'registrar'])->group(function () {
    Route::get('/activity_log', [ActivityLogController::class, 'index'])->name('registrar.activity_log');
    // Add other routes as needed
});


//Route For record_requests table
Route::post('/document_types', [DocumentTypeController::class, 'store'])->name('document_types.store'); //document_types is  the database table.
Route::get('/registrar', [DocumentTypeController::class, 'index']);
Route::get('/academic_record_request_table-table', [DocumentTypeController::class, 'view']);
Route::delete('/document_types/{id}', [DocumentTypeController::class, 'destroy'])->name('document_types.destroy');

//Route For Update User Information Faculty
Route::patch('/users/{id}', [FacultyController::class, 'update'])
    ->name('users.update');

//Route For Update User Information Registrar
//Route::patch('/users/{id}', [RegistrarController::class, 'update'])
 //   ->name('users.update');

//Route For Update User Information Student
Route::patch('/admitted/{id}', [AdmittedController::class, 'update'])
    ->name('admitted.update');

//ROUTE FOR OTP TWILIO
/*
Route::post('/', function () {
   return view('admissions.index');
})->name('index');
*/
Route::get('/verify', function () {
   return view('admissions.verify');
})->name('verify');


Route::post('/', 'App\Http\Controllers\AdmissionController@store')->name('index');
Route::post('/verify', 'App\Http\Controllers\AdmissionController@verify')->name('verify');



//END OF TWILIO ROUTE

//ROUTE FOR Update_Faculty
Route::get('update_faculty' , function () {
    return view ('/faculty/update_faculty');
});

//SEND SMS NOTIFICATION IN TWILIO
Route::get('/academic_record_request_table', 'App\Http\Controllers\DocumentTypeController@view')->name('academic_record_request_table');
Route::post('/send-sms', 'App\Http\Controllers\SMSController@sendSms')->name('send-sms');

use App\Http\Controllers\SettingsController;

Route::post('send-otp', [SettingsController::class, 'sendOtp'])->name('send-otp');
// Route::get('/layout/dashboard', 'SettingsController@showEnrollmentDetails')->name('enrollment');

//END OF SMS NOTIFICATION IN TWILIO

//calendar
Route::get('/faculty/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/faculty/get-event', [CalendarController::class, 'getEvent'])->name('get-event');
Route::get('/faculty/create', [CalendarController::class, 'create'])->name('calendar-events.create');
Route::post('/faculty/store', [CalendarController::class, 'store'])->name('calendar-events.store');
Route::put('/faculty/update/{id}', [CalendarController::class, 'update'])->name('calendar-events.update');
Route::delete('/faculty/delete/{id}', [CalendarController::class, 'delete'])->name('calendar-events.delete');

//section
Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');

//address
Route::get('/get-municipalities/{province_id}', [AddressController::class, 'getMunicipalities'])->name('get-municipalities');
Route::get('/get-barangays/{municipality_id}', [AddressController::class, 'getBarangays'])->name('get-barangays');
