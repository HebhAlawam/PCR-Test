<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/about', function () { return view('frontend.about'); })->name('about');
Route::get('/contact', function () { return view('frontend.contact'); })->name('contact');
Route::get('/Prevention', function () { return view('frontend.Prevention'); })->name('Prevention');


//form
Route::resource('/form',FormController::class)->middleware('auth');
Route::controller(FormController::class)->prefix('formByCenter')->middleware('auth')->group(function () {  
    Route::get('/create/{id}', 'formByCenter')->name('form.byCenter.create');
    Route::get('/centers', 'centers')->name('centers');
});


###### Admin route #######
    //dashboard
    Route::controller(AdminController::class)->prefix('admin')->middleware('admin')->group(function () {  
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    //for center
    Route::resource('/center',CenterController::class)->middleware('admin');
        Route::controller(CenterController::class)->prefix('center')->middleware('admin')->group(function () {  
            Route::get('/soft/delete/{id}', 'softdelete')->name('center.softdelete');
            Route::get('/trash/all', 'trash')->name('center.trash');
            Route::get('/back/from/trash/{id}', 'backFromTrash')->name('center.back');
            Route::get('/reservations/{id}', 'reservations')->name('center.reservations');//reservations by center

        });

    //for disease
    Route::resource('/disease',DiseaseController::class)->middleware('admin');
    Route::controller(DiseaseController::class)->prefix('disease')->middleware('admin')->group(function () {  
        Route::get('/soft/delete/{id}', 'softdelete')->name('disease.softdelete');
        Route::get('/trash/all', 'trash')->name('disease.trash');
        Route::get('/back/from/trash/{id}', 'backFromTrash')->name('disease.back');
    });

    //for symptom
    Route::resource('/symptom',SymptomController::class)->middleware('admin');
    Route::controller(SymptomController::class)->prefix('symptom')->middleware('admin')->group(function () {  
        Route::get('/soft/delete/{id}', 'softdelete')->name('symptom.softdelete');
        Route::get('/trash/all', 'trash')->name('symptom.trash');
        Route::get('/back/from/trash/{id}', 'backFromTrash')->name('symptom.back');
    });

    //for user
    Route::controller(UserController::class)->prefix('user')->middleware('admin')->group(function () {  
        Route::get('/', 'index')->name('user.index');
    });

    //for reservation
    Route::controller(ReservationController::class)->prefix('reservation')->middleware('admin')->group(function () {  
        Route::get('/all', 'all')->name('reservation.all');
        Route::get('/filter', 'all')->name('reservation.filter');
        Route::get('/show/{id}', 'show')->name('reservation.show');
        Route::put('/update', 'update')->name('reservation.update');
        Route::get('/result/update', 'updateResulte')->name('reservation.result.update');
    });
###### End admin route #######





 
