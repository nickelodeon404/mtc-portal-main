<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrolledController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DocumentTypeController;
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

Route::get('academics', function () {
    return view('academics');
});

Route::get('login', function () {
    return view('login');
})->middleware('auth');

/*
Route::get('student', function () {
    return view('students.index');
})->middleware('student');
*/

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

Route::get('faculty', function () {
    return view('faculty.index');
})->middleware('faculty');

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
Route::delete('/admission/{id}', [AdmissionController::class, 'destroy'])->name('admission.destroy');

//Route for Enrollees
Route::get('/registrar', [EnrollmentController::class, 'index']);
Route::get('/enrollment_table-table', [EnrollmentController::class, 'view']);

Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');

//Route for Enrolled
Route::get('/registrar', [EnrolledController::class, 'index']);
Route::get('/enrolled_table-table', [EnrolledController::class, 'view']);

Route::post('/enrollment/{id}/add-to-enrolled', [EnrollmentController::class, 'addToEnrolled'])->name('enrollment.addToEnrolled');

Route::delete('/enrolled/{id}', [EnrolledController::class, 'destroy'])->name('enrolled.destroy');


//Route For record_requests table
Route::post('/document_types', [DocumentTypeController::class, 'store'])->name('document_types.store'); //document_types is  the database table.
Route::get('/registrar', [DocumentTypeController::class, 'index']);
Route::get('/academic_record_request_table-table', [DocumentTypeController::class, 'view']);
Route::delete('/document_types/{id}', [DocumentTypeController::class, 'destroy'])->name('document_types.destroy');

/*Route for updating the student data in enrollment table*/
Route::get('/enrollment{id}', [EnrollmentController::class, 'show'])
    ->name('enrollment.show');

Route::patch('/enrollment{id}', [EnrollmentController::class, 'update'])
    ->name('enrollment.update');


//ROUTE FOR OTP SEMEPHORE.CO API
Route::post('/sendOTP', 'AdmissionController@sendOTP');

//ROUTE FOR Update_Faculty
Route::get('update_faculty' , function () {
    return view ('update_faculty');
});