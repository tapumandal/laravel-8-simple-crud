<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CustomerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function()
{
    return redirect()->route('customer');
});

Route::resource('customer', CustomerController::class,[
				'names' => [
				        'index' => 'customer'
				]
]);
Route::resource('department', DepartmentController::class,[
				'names' => [
				        'index' => 'department'
				]
]);