<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\admin\UsersTable; // This should match the namespace in UsersTable.php
use App\Livewire\admin\PackagesCrud;
use App\Livewire\admin\PackagesList;
use App\Livewire\admin\EditPackage;

use App\Livewire\admin\Dispatch;


use App\Http\Controllers\VerificationController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\AddressController;
use App\Livewire\AddressManager;
use App\Http\Controllers\PrivacyController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', function () {
    return view('auth.admin.login');
});

// Route::prefix('admin')->group(function () {
//     Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])
//         ->middleware('guest')
//         ->name('password.request');
// });

// Route::get('/admin/forgot-password', function () {
//     return view('admin.password.request');
// });
//old jetstram login
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
           // return redirect('/admin');
           return redirect('/admin/dispatch');
        }

        // If not an admin, proceed to the standard user dashboard
        return redirect('/');
    })->name('dashboard');

    //customers
    //add Route

    // Here you can define other routes that should be accessible to verified users
});

//redirect admin

Route::middleware(['auth:sanctum', 'verified', 'UserAdmin'])->group(function () {
    Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
      //  Route::get('/users', UsersTable::class);
        //return view('dashboard');
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        // Route::get('/dispatch', function () {
        //     return view('admin.dashboard');
        // });
        Route::get('/dispatch', Dispatch::class)->name('dispatch');
        Route::get('/users', UsersTable::class)->name('users');

        // Route::get('/users', UsersTable::class);
       
    });

});
// Route::get('/users', UsersTable::class);
//Route::get('/dispatch', Dispatch::class)->name('dispatch');
// Route::get('/packages', PackagesCrud::class)->name('packages');
// Route::get('/package-list', PackagesList::class)->name('package.list');
// Route::get('/packages/{packageId}/edit', EditPackage::class)->name('packages.edit');



// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Your admin routes
});

Route::get('/google/redirect', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/auth/facebook', [App\Http\Controllers\FacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [App\Http\Controllers\FacebookController::class, 'handleFacebookCallback'])->name('facebook.callback');

Route::view('/otp', 'otp');
Route::post('/send-verification', [VerificationController::class, 'sendVerification']);
Route::post('/verify-code', [VerificationController::class, 'verifyCode']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/addresses/{address?}',[AddressManager::class,'addresses.index']);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/addresses/{address?}', AddressManager::class)->name('addresses.index');
});

Route::get('/privacy-policy', [PrivacyController::class, 'show'])->name('privacy.policy');