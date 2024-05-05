<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\WeatherController;
use Illuminate\Routing\Router;

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

Route::prefix('seasons')->name('seasons.')->group(function (Router $router) {
    Route::get('/descriptions', [SeasonController::class, 'descriptions'])->name('descriptions');
    Route::get('/descriptions/create', [SeasonController::class, 'create_descriptions'])->name('create_descriptions');
    Route::post('/descriptions', [SeasonController::class, 'store_descriptions'])->name('store_descriptions');
    Route::get('/images', [SeasonController::class, 'images'])->name('images');
    Route::get('/images/create', [SeasonController::class, 'create_images'])->name('create_images');
    Route::post('/images', [SeasonController::class, 'store_images'])->name('store_images');
    Route::get('/images/{id}', [SeasonController::class, 'get_image'])->name('get_image');
});

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'store'])->name('weather.store');