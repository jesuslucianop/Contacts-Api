<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ContactsController;


Route::get('/getContacts', [ContactsController::class, 'index']);
Route::post('/create', [ContactsController::class, 'store']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::resource('contacts','API\TestController');




