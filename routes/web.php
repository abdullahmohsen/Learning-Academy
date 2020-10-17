<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'Front\HomepageController@index')->name('front.homepage');
Route::get('/', [Front\HomepageController::class, 'index'])->name('front.homepage');
// Route::get('/', function () {
//     return view('front.index');
// });


Route::get('/cat/{id}', [Front\CourseController::class, 'cat'])->name('front.cat');
Route::get('/cat/{id}/course/{c_Id}', [Front\CourseController::class, 'show'])->name('front.show');
Route::get('/contact', [Front\ContactController::class, 'index'])->name('front.contact');

Route::post('/message/newsletter', [Front\MessageController::class, 'newsletter'])->name('front.message.newsletter');
Route::post('/message/contact', [Front\MessageController::class, 'contact'])->name('front.message.contact');
Route::post('/message/enroll', [Front\MessageController::class, 'enroll'])->name('front.message.enroll');

//Authentication
Route::prefix('dashboard')->group(function () {

    //login
    Route::get('/login', [Admin\AuthController::class, 'login'])->name('admin.login');
    Route::post('/handle-login', [Admin\AuthController::class, 'handleLogin'])->name('admin.handleLogin');


    Route::middleware('adminAuth:admin')->group(function () {
        //logout
        Route::get('/logout', [Admin\AuthController::class, 'logout'])->name('admin.logout');

        //home
        Route::get('/', [Admin\HomeController::class, 'index'])->name('admin.home');

        //Category CRUD operators
        Route::get('/cats', [Admin\CatController::class, 'index'])->name('admin.cat.index');
        Route::get('/cats/create', [Admin\CatController::class, 'create'])->name('admin.cat.create');
        Route::post('/cats/store', [Admin\CatController::class, 'store'])->name('admin.cat.store');
        Route::get('/cats/edit/{id}', [Admin\CatController::class, 'edit'])->name('admin.cat.edit');
        Route::post('/cats/update', [Admin\CatController::class, 'update'])->name('admin.cat.update');
        Route::get('/cats/delete/{id}', [Admin\CatController::class, 'delete'])->name('admin.cat.delete');

        //Trainer CRUD operators
        Route::get('/trainers', [Admin\TrainerController::class, 'index'])->name('admin.trainer.index');
        Route::get('/trainers/create', [Admin\TrainerController::class, 'create'])->name('admin.trainer.create');
        Route::post('/trainers/store', [Admin\TrainerController::class, 'store'])->name('admin.trainer.store');
        Route::get('/trainers/edit/{id}', [Admin\TrainerController::class, 'edit'])->name('admin.trainer.edit');
        Route::post('/trainers/update', [Admin\TrainerController::class, 'update'])->name('admin.trainer.update');
        Route::get('/trainers/delete/{id}', [Admin\TrainerController::class, 'delete'])->name('admin.trainer.delete');

        //Course CRUD operators
        Route::get('/courses', [Admin\CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/courses/create', [Admin\CourseController::class, 'create'])->name('admin.course.create');
        Route::post('/courses/store', [Admin\CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/courses/edit/{id}', [Admin\CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/courses/update', [Admin\CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/courses/delete/{id}', [Admin\CourseController::class, 'delete'])->name('admin.course.delete');

        //Student CRUD operators
        Route::get('/students', [Admin\StudentController::class, 'index'])->name('admin.student.index');
        Route::get('/students/create', [Admin\StudentController::class, 'create'])->name('admin.student.create');
        Route::post('/students/store', [Admin\StudentController::class, 'store'])->name('admin.student.store');
        Route::get('/students/edit/{id}', [Admin\StudentController::class, 'edit'])->name('admin.student.edit');
        Route::post('/students/update', [Admin\StudentController::class, 'update'])->name('admin.student.update');
        Route::get('/students/delete/{id}', [Admin\StudentController::class, 'delete'])->name('admin.student.delete');
        Route::get('/students/show-courses/{id}', [Admin\StudentController::class, 'showCourses'])->name('admin.student.showCourses');
        Route::get('/students/{id}/courses/{c_id}/approve', [Admin\StudentController::class, 'approveCourse'])->name('admin.student.approveCourse');
        Route::get('/students/{id}/courses/{c_id}/reject', [Admin\StudentController::class, 'rejectCourse'])->name('admin.student.rejectCourse');
        Route::get('/students/{id}/courses/{c_id}/delete', [Admin\StudentController::class, 'deleteCourse'])->name('admin.student.deleteCourse');
        Route::get('/students/{id}/add-to-course', [Admin\StudentController::class, 'addCourse'])->name('admin.student.addCourse');
        Route::post('/students/{id}/add-to-course', [Admin\StudentController::class, 'storeCourse'])->name('admin.student.storeCourse');

    });
});
