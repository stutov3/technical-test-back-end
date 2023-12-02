<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TurbineController;
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

// farms
Route::get('/farms', [FarmController::class, 'index']);
Route::get('/farms/{farmID}', [FarmController::class, 'show']);
// turbines
Route::get('/farms/{farmID}/turbines', [TurbineController::class, 'getTurbinesForFarm']);
Route::get('/farms/{farmID}/turbines/{turbineID}', [TurbineController::class, 'getTurbineByFarmIdAndId']);
Route::get('/turbines', [TurbineController::class, 'getAllTurbines']);
Route::get('/turbines/{turbineID}', [TurbineController::class, 'getTurbineById']);

// components
Route::get('/components', [ComponentController::class, 'getAllComponents']);
Route::get('/components/{componentID}', [ComponentController::class, 'getComponentById']);
Route::get('/turbines/{turbineID}/components', [ComponentController::class, 'getComponentsByTurbineId']);
Route::get(
    '/turbines/{turbineID}/components/{componentID}',
    [ComponentController::class, 'getComponentByTurbineIdAndId']
);

// grades
Route::get('/grades', [GradeController::class, 'getAllGrades']);
Route::get('/grades/{gradeID}', [GradeController::class, 'getGradeById']);
Route::get('/components/{componentID}/grades', [GradeController::class, 'getGradesByComponentId']);
Route::get('/components/{componentID}/grades/{gradeID}', [GradeController::class, 'getGradeByComponentIdAndId']);

