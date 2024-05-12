<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('view');
    Route::get('/popular', [CourseController::class, 'popularCourse']);
    Route::get('/recommend', [CourseController::class, 'recommendCourse']);
    Route::get('/{id}', [CourseController::class, 'show'])->name('show');
    Route::get('/lesson/{id}',[LessonController::class,'index']);
   
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('view');
    Route::get('/{id}', [CourseController::class, 'coursesByCategoryID']);
  
});

Route::get('/search/{search}',[SearchController::class,'coursesBySearchKey']);
Route::get('/user/{id}',[StudentController::class,'profile']);
Route::get('/user/cart/{id}',[CartController::class,'index']);
Route::get('/user/cart/delete/{userID}/{courseID}',[CartController::class,'removeCartItem']);
Route::get('/user/cart/add/{userID}/{courseID}',[CartController::class,'addToCart']);
Route::get('/user/courses/{userID}',[StudentController::class,'myCourses']);
Route::get('/isMyCourses/{userID}/{courseID}',[StudentController::class,'isMyCourses']);


Route::post('/login', [StudentController::class, 'login']);
Route::post('/user/update/{id}', [StudentController::class, 'update']);


// Đăng ký
Route::post('/register', [StudentController::class, 'register']);




