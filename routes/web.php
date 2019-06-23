<?php

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


Route::get('/home', function (){
    return view('101536.homepage');
});

//Student Routes
Route::get('/student', 'StudentController@fetchStudents');
Route::post('/search', 'StudentController@particularStudent');
Route::get('/newstudent', 'StudentController@index');
Route::post('/register_student','StudentController@newStudent');


//Fees Routes
Route::post('/fees_paid', 'FeesController@newFeePayment');
Route::get('/fees', 'PagesController@fees');

//Search User
//Route::get('/search','StudentController@particularStudent');

//Inserting dynamic parameters ito the URL
/*Route::get('/users/{id}', function ($id){
    return 'This is user '.$id;
});

Route::get('/', function () {
    return view('101536.homepage');
});

Route::get('/fees', function (){
    return view('101536.fees');
});

Route::get('/student', function (){
    return view('101536.student');
}); */

