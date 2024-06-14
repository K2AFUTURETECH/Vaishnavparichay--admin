<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GotrasController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UserController;

// Route::get('/login', [\App\Http\Controllers\UserController::class, 'index'])->name('login');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('adminlogin');

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout'); // Use  for logout
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.admindashboard');

    //admin for vaishnav parichya state
    Route::get('state/listing', [DashboardController::class, 'state'])->name('state.list');
    Route::get('state/add', [DashboardController::class, 'add'])->name('state.add');
    Route::post('state/addNew', [DashboardController::class, 'store'])->name('state.addNew');
    Route::get('state/edit/{id}', [DashboardController::class, 'edit'])->name('state.edit');
    Route::post('state/editdocuments/{id}', [DashboardController::class, 'update'])->name('state.editstate');
    Route::get('state/delete/{id}', [DashboardController::class, 'destroy'])->name('state.delete');
   
});




// Route::get('/admin',[DashboardController::class, 'admin'])->name('admin.admindashboard');

//app website for vaishnav parichya
Route::get('/', [LocationController::class, 'index'])->name('home');


//app website for vaishnav parichya
Route::get('/district/{stateid}', [LocationController::class, 'district'])->name('district');
Route::get('/tehsil/{distid}', [LocationController::class, 'tehsil'])->name('tehsil');
Route::get('/city/{tehsilid}', [LocationController::class, 'city'])->name('city');

// app website for vaishnav parichya  for directory
Route::post('directory/listing', [LocationController::class, 'directory'])->name('backend.directory.list');
Route::get('aboutus', [LocationController::class, 'aboutus'])->name('backend.directory.aboutus');
Route::get('directory/view/{id}', [LocationController::class, 'view'])->name('backend.directory.view');






//District
Route::get('district/listing', [DistrictController::class, 'listing'])->name('district.list');




// php artisan make:controller UserController --model=Gotras

// php artisan make:migration change_column_users--table=tbl_tyremaster

// php artisan make:migration create_tbl_plan

//php artisan make:model Gotras


Route::get('/cc', function () {
    Artisan::call('cache:clear');
    return response('cc', 200);
});

Route::get('/rc', function () {
    Artisan::call('route:cache');
    return response('rc', 200);
});

Route::get('/configc', function () {
    Artisan::call('config:cache');
    return response('configc', 200);
});
Route::get('/vc', function () {
    Artisan::call('view:clear');
    return response('vc', 200);
});

Route::get('/db', function () {
    Artisan::call('db:seed');
    return response('db', 200);
});