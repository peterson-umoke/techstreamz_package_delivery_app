<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
//
Route::get('test', function () {
//    $latitude       =       "28.418715";
//    $longitude      =       "77.0478997";
//    /** @var \Illuminate\Database\Eloquent\Builder $sql */
//    $sql = \App\Models\Vehicle::nearest_vehicles($latitude, $longitude, 1);
//    dd($sql->get(), $sql->toSql());
    $query = \App\Models\Coupon::ifCouponUsed(1, 'lool');
    $query2 = \App\Models\Coupon::checkCode('lol',20);
    dd(
      $query->toSql(),
        $query->get(),
        $query2->toSql(),
        $query2->getBindings(),
        $query2->get(),
    );
});
