<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



//Route::get('users', function() {
    //return User::all();
//});

/*Route::post('/user', function(Request $request) {
    $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email'=>'required  | unique:users',
        'password' => 'required',
    ],[
        'firstName.required' => 'O campo nome é obrigatório',
        'email.unique'=> 'esse email ja esta cadastrado',
        'email.required'=> 'o campo email é obrigatório',
        'lastName.required' => 'O campo Sobrenome é obrigatório',
        'password.required' => 'O campo senha é obrigatório',
    ]);
});*/

Route::post('/auth', [Auth::class, 'auth']);
Route::get('/auth/verify', [Auth::class, 'verify']);


//Route::get('user', 'UserController@index');
//Route::post('user', 'UserController@store');
//Route::get('user/{id}', 'UserController@show');
//Route::put('user/{id}', 'UserController@update');
//Route::delete('user/{id}', 'UserController@destroy');

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
