<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteApiController;
use App\Http\Controllers\AppApiController;

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

Route::prefix('website')->group(function () {

    Route::get('/home', [WebsiteApiController::class, 'home'])->name('websiteHome');
    
});

Route::prefix('app')->group(function () {

    Route::get('/individual-assesments', [AppApiController::class, 'individualAssesments'])->name('appIndividualAssesments');
    Route::get('/collective-assesments', [AppApiController::class, 'collectiveAssesments'])->name('appCollectiveAssesments');
    Route::get('/quizzes', [AppApiController::class, 'quizzes'])->name('appQuizzes');
    Route::get('/individual-assesments/{id}', [AppApiController::class, 'individualAssesment'])->name('appIndividualAssesment');
    Route::get('/collective-assesments/{id}', [AppApiController::class, 'collectiveAssesment'])->name('appCollectiveAssesment');
    Route::post('/individual-assesments', [AppApiController::class, 'saveIndividualAssesment'])->name('appSaveIndividualAssesment');
    Route::post('/collective-assesments', [AppApiController::class, 'saveCollectiveAssesment'])->name('appSaveCollectiveAssesment');
    
});