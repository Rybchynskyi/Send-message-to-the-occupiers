<?php

use App\Http\Controllers\Api\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user/{id}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);
    return $user;
});

// purchases
Route::middleware('auth:sanctum')->prefix('purchases')->namespace('App\Http\Controllers\Api\Purchases')->group(function (){
    Route::get('/', 'IndexController');
    Route::post('/', 'StoreController')->name('api.purchase.store');
    Route::patch('/{purchase}', 'UpdateController');
//    Route::post('/upload/{purchase}', 'UploadImageController')->name('purchase.uploadImage');
    Route::delete('/{purchase}', 'DeleteController');
//    Route::get('/success', 'SuccessController')->name('purchase.success');
});
