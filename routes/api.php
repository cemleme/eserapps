<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirmaController;
use App\Http\Controllers\IcraController;
use App\Http\Controllers\AuthController;

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

Route::get('/test', function(){

    $user = App\Models\User::find(1);
    $permission = $user->hasPermission('AppsUsersEdit');
        
    if($permission)
    {
        echo 'inarray true';
        return true;
    }
    else
    {
        echo 'inarray false';
        return false;
    }


    // $permission = App\Models\Permission::find(12);

    // //return $permission;
    //  $group = App\Models\Group::find(3);
    //  $user = App\Models\User::find(1);

    //  $user->groups()->attach($group);

    //  //$group->permissions()->attach($permission);


    // // return $user->groups()->get();
    // //return App\Models\Group::find(2)->permissions;
    // return App\Models\User::find(1)->groups()->first()->permissions;
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::resource('firma', FirmaController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('icra', IcraController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => ['permission:AppsUsersEditf']], function () {
        Route::get('/permissions', [AuthController::class, 'permissions']);
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
