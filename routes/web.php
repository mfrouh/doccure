<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/doctor-register', function () {
    return view('auth.register-doctor');
});
Route::get('/', 'Guest\MainController@index');
Route::get('/doctor-profile/{username}', 'Guest\MainController@doctorprofile');
Route::get('/patient-profile', 'Guest\MainController@patientprofile');
Route::get('/search', 'Guest\MainController@search');


///admin route
Route::group(['prefix' => 'admin','middleware'=>['auth','Checkrole:admin']], function () {

    Route::resource('speciality', 'Admin\SpecialityController');
    Route::get('doctors', 'Admin\MainController@doctors');
    Route::get('patients', 'Admin\MainController@patients');
    Route::get('dashboard', 'Admin\MainController@dashboard');
    Route::get('appointments', 'Admin\MainController@appointments');
    Route::get('surgeries', 'Admin\MainController@surgeries');
    Route::get('reviews', 'Admin\MainController@reviews');


});


///doctor route
Route::group(['prefix' => 'doctor','middleware'=>['auth','Checkrole:doctor']], function () {
    //Doctor Dashboard
    Route::get('dashboard', 'Doctor\MainController@dashboard');
    //Doctor
    Route::get('change-password', 'Doctor\SettingController@changepassword');
    Route::post('change-password', 'Doctor\SettingController@postchange');
    //Doctor my-patients
    Route::get('my-patients', 'Doctor\MainController@mypatients');
    //Doctor appointments
    Route::get('appointments', 'Doctor\AppointmentController@index');
    Route::post('appointments', 'Doctor\AppointmentController@getappointment');
    Route::get('followups', 'Doctor\FollowUpController@index');
    Route::post('followups', 'Doctor\FollowUpController@getfollowups');
    Route::get('appointment/{appointment}', 'Doctor\AppointmentController@show');
    Route::post('appointment/changestate', 'Doctor\AppointmentController@changestate');
    Route::post('appointment/diagnose', 'Doctor\AppointmentController@diagnose');
    //Doctor social-media
    Route::get('social-media', 'Doctor\MainController@socialmedia');
    Route::post('social-media', 'Doctor\MainController@postsocialmedia');
    //Doctor setting
    Route::get('setting', 'Doctor\SettingController@setting');
    Route::post('setting', 'Doctor\SettingController@postsetting');
    Route::get('setting/basic-information', 'Doctor\SettingController@basicinformation');
    Route::post('setting/basic-information', 'Doctor\SettingController@postbasicinformation');
    //Doctor services
    Route::get('setting/services', 'Doctor\SettingController@services');
    Route::post('setting/services', 'Doctor\SettingController@storeservices');
    Route::delete('setting/services/{services}', 'Doctor\SettingController@deleteservices');
    //Doctor education
    Route::get('setting/education', 'Doctor\SettingController@education');
    Route::post('setting/education', 'Doctor\SettingController@storeeducation');
    Route::delete('setting/education/{education}', 'Doctor\SettingController@deleteeducation');
    //Doctor experience
    Route::get('setting/experience', 'Doctor\SettingController@experience');
    Route::post('setting/experience', 'Doctor\SettingController@storeexperience');
    Route::delete('setting/experience/{experience}', 'Doctor\SettingController@deleteexperience');
    //Doctor reviews
    Route::get('reviews', 'Doctor\MainController@reviews');
    //Doctor abouteme
    Route::get('abouteme', 'Doctor\SettingController@abouteme')->name('abouteme');
    Route::post('abouteme', 'Doctor\SettingController@update');
    Route::post('abouteme/create', 'Doctor\SettingController@store');
    //Doctor clinic
    Route::get('/clinic', 'Doctor\ClinicController@index')->name('clinic');
    Route::post('/clinic', 'Doctor\ClinicController@update');
    Route::post('/clinic/create', 'Doctor\ClinicController@store');
    Route::post('/clinic/gallery', 'Doctor\ClinicController@gallery');
    //Doctor prescription
    Route::get('prescriptions', 'Doctor\PrescriptionController@index');
    Route::post('prescriptions', 'Doctor\PrescriptionController@getprescriptions');
    Route::get('prescription/{id}', 'Doctor\PrescriptionController@show');
    //Doctor prescription_content
    Route::resource('prescriptioncontent', 'Doctor\PrescriptionContentController');
    //Doctor surgery
    Route::resource('surgery', 'Doctor\SurgeryController');
    Route::post('surgeries', 'Doctor\SurgeryController@getsurgeries');
    Route::get('/patient-profile/{username}', 'Doctor\MainController@patient');

});

//Patient Route
Route::group(['prefix' => 'patient','middleware'=>['auth','Checkrole:patient']], function () {
    //patient dashboard
    Route::get('dashboard', 'Patient\MainController@dashboard');
    //change password
    Route::get('change-password', 'Patient\SettingController@changepassword');
    Route::post('change-password', 'Patient\SettingController@postchange');
    //favourites doctor
    Route::get('favourites', 'Patient\MainController@favourites');
    Route::post('favourite', 'Patient\MainController@postfavourite');
    //setting information
    Route::get('setting', 'Patient\SettingController@setting');
    Route::post('setting', 'Patient\SettingController@postsetting');
    //patient appointment
    Route::get('appointments', 'Patient\AppointmentController@index');
    Route::post('booking', 'Patient\AppointmentController@store');
    Route::get('booking/{username}', 'Patient\AppointmentController@create');
    Route::post('booking/day', 'Patient\AppointmentController@day');
    Route::post('booking/time', 'Patient\AppointmentController@time');
    //patient prescription
    Route::get('prescriptions', 'Patient\MainController@prescriptions');
    Route::get('surgeries', 'Patient\MainController@surgeries');
    //review doctor
    Route::post('/review', 'Patient\MainController@review');


});
