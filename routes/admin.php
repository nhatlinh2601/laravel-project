<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function () {

        
        Route::get('/admin', [HomeController::class, 'dashboard_admin'])->middleware('auth')->name('dashboard_admin');

        Route::get('/gv', [HomeController::class, 'dashboard_teacher'])->middleware('auth')->name('dashboard_teacher');

        Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

        Route::post('/login', [LoginController::class, 'login']);


        Route::get('/logout', [LoginController::class, 'logout']);

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


        Route::get('/edit/{id}', [AdminController::class, 'viewProfile'])->middleware('auth')->name('view-profile');

        Route::post('/edit/{id}', [AdminController::class, 'editProfile'])->middleware('auth')->name('edit-profile');


        Route::prefix('user')->middleware(['auth', 'role:admin'])->name('user.')->group(function () {

                Route::get('/', [UserController::class, 'listUser'])->name('index');

                Route::get('/add', [UserController::class, 'add'])->name('add');

                Route::post('/add', [UserController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [UserController::class, 'listUser'])->name('list');

                Route::get('/list/ajax', [UserController::class, 'listUserAjax'])->name('list-ajax');

                Route::post('/list/group', [UserController::class, 'userByGroup'])->name('list-group');

                Route::post('/list/group/ajax', [UserController::class, 'userByGroupAjax'])->name('list-group-ajax');

                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');

                Route::post('/edit/{user}', [UserController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete');

                Route::get('/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('force-delete');

                Route::get('/restore/{id}', [UserController::class, 'restore'])->name('restore');

                Route::post('/delete-multiple', [UserController::class, 'deleteMultiple'])->name('delete-multiple');

                Route::match(['get', 'post'], '/find-user', [UserController::class, 'findUser'])->name('find-user');

                Route::prefix('post')->name('post.')->group(function () {

                        Route::get('/write', [UserController::class, 'writePost'])->name('write');

                        Route::post('/write', [UserController::class, 'postWritePost'])->name('post-write');

                        Route::get('/my-post', [UserController::class, 'myPost'])->name('my-post');
                });
        });

        Route::get('/user/profile/{user}', [UserController::class, 'profile'])->name('user.profile');



        Route::prefix('category')->middleware(['auth', 'role:admin'])->name('category.')->group(function () {

                Route::get('/', [CategoryController::class, 'listCategory'])->name('index');

                Route::get('/add', [CategoryController::class, 'add'])->name('add');

                Route::post('/add', [CategoryController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [CategoryController::class, 'listCategory'])->name('list');

                Route::get('/list/ajax', [CategoryController::class, 'listCategoryAjax'])->name('list-ajax');

                Route::get('/view/{category}', [CategoryController::class, 'view'])->name('view');

                Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');

                Route::post('/edit/{category}', [CategoryController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('delete');

                Route::match(['get', 'post'], '/find-category', [CategoryController::class, 'findCategory'])->name('find-category');
        });


        Route::prefix('course')->middleware(['auth'])->name('course.')->group(function () {

                Route::get('/', [CourseController::class, 'listCourse'])->name('index');
              

                Route::get('/add', [CourseController::class, 'add'])->name('add');

                Route::post('/add', [CourseController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [CourseController::class, 'listCourse'])->name('list');

                Route::get('/list/ajax', [CourseController::class, 'listCourseAjax'])->name('list-ajax');

                Route::post('/list/category', [CourseController::class, 'courseByCategory'])->name('list-category');

                Route::get('/view/{course}', [CourseController::class, 'view'])->name('view');

                Route::get('/manage/{course}', [CourseController::class, 'manage'])->name('manage');

                Route::get('/detail/{course}', [CourseController::class, 'detail'])->name('detail');

                Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');

                Route::post('/edit/{course}', [CourseController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{course}', [CourseController::class, 'delete'])->name('delete');

                Route::match(['get', 'post'], '/find-course', [CourseController::class, 'findCourse'])->name('find-course');

                Route::get('/forceDelete/{id}', [CourseController::class, 'forceDelete'])->name('force-delete');

                Route::get('/restore/{id}', [CourseController::class, 'restore'])->name('restore');

                Route::post('/delete-multiple', [CourseController::class, 'deleteMultiple'])->name('delete-multiple');

                Route::match(['get', 'post'], '/find-course', [CourseController::class, 'findCourse'])->name('find-course');



                Route::prefix('lesson')->middleware('auth')->name('lesson.')->group(function () {

                        Route::get('/{course}/add', [LessonController::class, 'add'])->name('add');

                        Route::post('/{course}/add', [LessonController::class, 'postAdd'])->name('post-add');


                        Route::get('/{course}/list/', [LessonController::class, 'listLesson'])->name('list');

                        Route::get('/{course}/list/ajax', [LessonController::class, 'listLessonAjax'])->name('list-ajax');



                        Route::get('/edit/{lesson}', [LessonController::class, 'edit'])->name('edit');

                        Route::post('/edit/{lesson}', [LessonController::class, 'postedit'])->name('post-edit');

                        Route::get('/delete/{lesson}', [LessonController::class, 'delete'])->name('delete');

                        Route::match(['get', 'post'], '/find-lesson', [LessonController::class, 'findLesson'])->name('find-lesson');

                        Route::prefix('video')->name('video.')->group(function () {

                                Route::get('/{lesson}/add', [VideoController::class, 'add'])->name('add');

                                Route::post('/{lesson}/add', [VideoController::class, 'postAdd'])->name('post-add');

                                Route::get('/{lesson}/edit', [VideoController::class, 'postEditLesson'])->name('post-edit');

                                Route::get('/delete/{video}', [VideoController::class, 'delete'])->name('delete');
                        });
                });
        });

        Route::prefix('review')->middleware(['auth', 'role:admin'])->name('review.')->group(function () {

                Route::get('/', [ReviewController::class, 'listReview'])->name('index');

                Route::get('/add', [ReviewController::class, 'add'])->name('add');

                Route::post('/add', [ReviewController::class, 'postAdd'])->name('post-add');

                Route::get('/detail/{review}', [ReviewController::class, 'detail'])->name('detail');

                Route::get('/list', [ReviewController::class, 'listReview'])->name('list');

                Route::get('/list/ajax', [ReviewController::class, 'listReviewAjax'])->name('list-ajax');

                Route::post('/list/category', [ReviewController::class, 'postByCategory'])->name('list-category');

                Route::get('/manage/{review}', [ReviewController::class, 'manage'])->name('manage');

                Route::get('/edit/{review}', [ReviewController::class, 'edit'])->name('edit');

                Route::post('/edit/{review}', [ReviewController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{review}', [ReviewController::class, 'delete'])->name('delete');

                Route::match(['get', 'post'], '/find-review', [ReviewController::class, 'findReview'])->name('find-review');
        });





        Route::prefix('teacher')->middleware(['auth', 'role:admin'])->name('teacher.')->group(function () {

                Route::get('/', [TeacherController::class, 'listTeacher'])->name('index');

                Route::get('/add', [TeacherController::class, 'add'])->name('add');

                Route::post('/add', [TeacherController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [TeacherController::class, 'listTeacher'])->name('list');

                Route::get('/list/ajax', [TeacherController::class, 'listTeacherAjax'])->name('list-ajax');

                Route::get('/profile/{teacher}', [TeacherController::class, 'profile'])->name('profile');

                Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');

                Route::post('/edit/{teacher}', [TeacherController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');

                Route::match(['get', 'post'], '/find-teacher', [TeacherController::class, 'findTeacher'])->name('find-teacher');
        });

        Route::prefix('post')->middleware(['auth', 'role:admin'])->name('post.')->group(function () {

                Route::get('/', [PostController::class, 'listPost'])->name('index');

                Route::get('/add', [PostController::class, 'add'])->name('add');

                Route::post('/add', [PostController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [PostController::class, 'listPost'])->name('list');

                Route::get('/list/ajax', [PostController::class, 'listPostAjax'])->name('list-ajax');

                Route::post('/list/category', [PostController::class, 'postByCategory'])->name('list-category');

                Route::get('/post/{post}', [PostController::class, 'detail'])->name('detail');

                Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');

                Route::post('/edit/{post}', [PostController::class, 'postedit'])->name('post-edit');

                Route::get('/delete/{post}', [PostController::class, 'delete'])->name('delete');

                Route::match(['get', 'post'], '/find-post', [PostController::class, 'findPost'])->name('find-post');
        });

        Route::prefix('order')->middleware(['auth', 'role:admin'])->name('order.')->group(function () {

                Route::get('/', [OrderController::class, 'listOrder'])->name('index');

                Route::get('/add', [OrderController::class, 'add'])->name('add');

                Route::post('/add', [OrderController::class, 'postAdd'])->name('post-add');

                Route::get('/list', [OrderController::class, 'listOrder'])->name('list');

                Route::get('/list/ajax', [OrderController::class, 'listOrderAjax'])->name('list-ajax');

                Route::post('/student', [OrderController::class, 'getStudent'])->name('getStudent');

                Route::post('/course', [OrderController::class, 'getCourse'])->name('getCourse');

                Route::post('/find-by-status', [OrderController::class, 'findByStatus'])->name('find-by-status');

                Route::post('/find-by-date-searchkey', [OrderController::class, 'findByDateSearchKey'])->name('find-by-date-searchkey');

                Route::get('/confirm/{order}', [OrderController::class, 'confirm'])->name('confirm');

                Route::get('/order/detail/{order}', [OrderController::class, 'detail'])->name('detail');

                Route::get('/delete/{order}', [OrderController::class, 'delete'])->name('delete');

                Route::match(['get', 'order'], '/find-order', [OrderController::class, 'findOrder'])->name('find-order');
        });

        Route::prefix('student')->middleware(['auth', 'role:admin'])->name('student.')->group(function () {

                Route::get('/', [OrderController::class, 'listOrder'])->name('index');
        });

        Route::prefix('menu')->middleware(['auth', 'role:admin'])->name('menu.')->group(function () {

                Route::get('/', [AdminController::class, 'menu'])->name('index');

                Route::post('/', [AdminController::class, 'setting'])->name('setting');

                Route::get('/delete/{id}' , [AdminController::class, 'deleteMenu'])->name('delete');

                Route::get('/child-delete/{id}' , [AdminController::class, 'deleteChildMenu'])->name('child-delete');
        });

       
        Route::prefix('role')->name('role.')->middleware(['auth', 'role:admin'])->group(function () {
                Route::get('/' , [AdminController::class,'listRole'])->name('index');

                Route::get('/setPermission/{role}' , [AdminController::class,'setPermissionForRole'])->name('set-permission');

                Route::post('/setPermission/{role}' , [AdminController::class,'postSetPermissionForRole'])->name('post-set-permission');

                Route::get('/add' , [AdminController::class,'addRole'])->name('add');

                Route::post('/add' , [AdminController::class,'postAddRole'])->name('post-add');

                Route::get('/delete{role}' , [AdminController::class,'deleteRole'])->name('delete');
        });

        Route::prefix('permission')->name('permission.')->middleware(['auth', 'role:admin'])->group(function () {
                Route::get('/' , [AdminController::class,'listPermission'])->name('index');


                Route::get('/add' , [AdminController::class,'addPermission'])->name('add');

                Route::post('/add' , [AdminController::class,'postAddPermission'])->name('post-add');

                Route::get('/edit/{permission}' , [AdminController::class,'editPermission'])->name('edit');

                Route::post('/edit/{permission}' , [AdminController::class,'postEditPermission'])->name('post-edit');

                Route::get('/delete/{permission}' , [AdminController::class,'deletePermission'])->name('delete');
        });

        Route::prefix('gv')->name('gv.')->group(function () {
                Route::get('myCourses' , [TeacherController::class, 'myCourses'])->name('myCourses');
                Route::get('myStudents' , [TeacherController::class, 'myStudents'])->name('myStudents');
        });
});
