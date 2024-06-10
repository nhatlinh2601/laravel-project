<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VnpayController;
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
    Route::get('/lesson/document/{id}',[LessonController::class,'getDocuments']);
    Route::get('/lesson/comment/{id}',[LessonController::class,'getComments']);
    Route::get('/lesson/comment/isMyComment/{userID}/{commentID}',[LessonController::class,'isMyComment']);
   
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
Route::get('/isMyCart/{userID}/{courseID}',[StudentController::class,'isMyCart']);
Route::get('/myCart/{userID}',[StudentController::class,'myCart']);

Route::get('/lesson/test/{lessonID}',[LessonController::class,'getTest']);


Route::post('/login', [StudentController::class, 'login']);
Route::post('/user/update/{id}', [StudentController::class, 'update']);
Route::post('/comment/add/{lessonId}/{userID}', [LessonController::class, 'addComment']);
Route::post('/comment/reply/add/{commentID}/{userID}', [LessonController::class, 'addReplyComment']);
Route::get('/comment/delete/{commentId}', [LessonController::class, 'deleteComment']);
Route::get('/comment/reply/delete/{commentId}', [LessonController::class, 'deleteReplyComment']);
Route::get('/comment/reply/{commentId}', [LessonController::class, 'getReplyComments']);
Route::get('lesson/comment/reply/{lessonID}', [LessonController::class, 'getAllReplyComments']);
Route::get('/comment/{commentId}', [LessonController::class, 'getCommentById']);


// Đăng ký
Route::post('/register', [StudentController::class, 'register']);

Route::get('/payment', [VNPayController::class, 'payment']);
Route::post('/create-payment', [VNPayController::class, 'createPayment'])->name("createPayment");
Route::get('/vnpay/response', [VnpayController::class, 'response'])->name('vnpay.response');
Route::get('/lesson/status/{id}',[LessonController::class,'updateStatus']);


Route::get('/payment/{userID}/{courseID}', [OrderController::class, 'postPayment'])->name("createPayment");




