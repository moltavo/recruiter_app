<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\StepController;

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
    return view('welcome');
});

Route::get('/timelines/diagram', function () {
    return view('timelines.diagram');
});
Route::get('/timelines/{timeline}/diagram', [TimelineController::class, 'diagram'])
    ->name('timelines.diagram');

Route::get('/timelines', [TimelineController::class, 'index'])->name('timelines');
Route::get('/timelines/{id}', [TimelineController::class, 'show'])->name('timelines.show');
Route::post('/timelines/create', [TimelineController::class, 'create']);
Route::get('/timelines/{timeline}/edit', [TimelineController::class, 'edit'])
    ->name('timelines.edit');

Route::get('/steps/create', [StepController::class, 'create']);
Route::get('/steps/update', [StepController::class, 'update']);
Route::get('/steps', [StepController::class, 'index']);
Route::get('/steps/{id}', [StepController::class, 'show']);
