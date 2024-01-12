<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\CarTypeController;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Frontend\FrontendCarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [UserController::class, 'Index']);


Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/password/change/password', [UserController::class, 'ChangePasswordStore'])->name('password.change.store');

});

require __DIR__.'/auth.php';

// Admin group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

});
// End admin group middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth','roles:admin'])->group(function(){
    // Team All Route
    Route::controller(TeamController::class)->group(function(){

        Route::get('/all/team', 'AllTeam')->name('all.team');
        Route::get('/add/team', 'AddTeam')->name('add.team');
        Route::post('/team/store', 'StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('team/update', 'UpdateTeam')->name('team.update');
        Route::get('delete/team/{id}', 'DeleteTeam')->name('delete.team');

    });

    // Book Area All Route
    Route::controller(TeamController::class)->group(function(){

        Route::get('/book/area', 'BookArea')->name('book.area');
        Route::post('/book/area', 'BookAreaUpdate')->name('book.area.update');

    });

    // CarType All Route
    Route::controller(CarTypeController::class)->group(function(){

        Route::get('/car/type/list', 'CarTypeList')->name('car.type.list');
        Route::get('/add/car/type', 'AddCarType')->name('add.car.type');
        Route::post('/car/type/store', 'CarTypeStore')->name('car.type.store');

    });

    // Car All Route
    Route::controller(CarController::class)->group(function(){

        Route::get('/edit/car/{id}', 'EditCar')->name('edit.car');
        Route::post('/update/car/{id}', 'UpdateCar')->name('update.car');
        Route::post('/store/car/no/{id}', 'StoreCarNumber')->name('store.car.no');
        Route::get('/edit/carno/{id}', 'EditCarNumber')->name('edit.carno');
        Route::post('/update/carno/{id}', 'UpdateCarNumber')->name('update.carno');
        Route::get('/delete/carno/{id}', 'DeleteCarNumber')->name('delete.carno');

        Route::get('/delete/car/{id}', 'DeleteCar')->name('delete.car');


    });

}); // End admin group middleware

// Car all route
Route::controller(FrontendCarController::class)->group(function(){

    Route::get('/cars/', 'AllFrontendCarList')->name('fcar.all');
    Route::get('/car/details/{id}', 'CarDetailsPage');
    Route::get('/bookings/', 'BookingSearch')->name('booking.search');
    Route::get('/search/car/details/{id}', 'SearchCarDetails')->name('search_car_details');


});

