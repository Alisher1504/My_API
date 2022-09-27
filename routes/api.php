<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

// Route::resource('products', ProductController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/show/{id}', [ProductController::class, 'show']);
Route::get('/search/{name}', [ProductController::class, 'search']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/store', [ProductController::class, 'store']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});






// Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
// Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);

// Route::get('/products', function() {
//     return Product::create([
//         'name' => 'product one',
//         'slug' => 'product-one',
//         'description' => 'This product one',
//         'price' => '99.99',
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
