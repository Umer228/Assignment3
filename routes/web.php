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

use App\Hostel;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function (){
   DB::insert('insert into hostels(hostelName, city, rent, hostelType, furnishedRoom, roomAvailable) values(?,?,?,?,?,?)',
       ['Malik hostel','Lahore', '5000', 'twoStar', '1', '20']);
});

Route::get('/read',function (){

    return var_dump(DB::select('select*from hostels where id=?',[1]));
});

Route::get('/readit',function (){
    $hostel = Hostel::all();

    foreach ($hostel as $hos){
        return $hos->hostelName;
    }
});

Route::get('/find',function (){
    $hostel = Hostel::find(2)->orderBy('id','desc')->take(1)->get();

        return $hostel;
});

Route::get('/user/{id}/hostel',function ($id){
    return User::find($id)->hostel;
});
