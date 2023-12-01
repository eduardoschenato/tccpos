<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\IndividualAssesmentController;
use App\Http\Controllers\CollectiveAssesmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UnderConstructionController;
use App\Http\Controllers\ImageController;

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

Route::middleware(['checkAuth'])->group(function () {

    Route::prefix('usuarios')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('usersList');
        Route::get('/novo', [UserController::class, 'new'])->name('usersNew');
        Route::get('/{id}', [UserController::class, 'form'])->name('usersForm');
        Route::post('/', [UserController::class, 'store'])->name('usersInsert');
        Route::put('/{id}', [UserController::class, 'update'])->name('usersUpdate');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('usersDelete');
        
    });

    Route::prefix('jogadores')->group(function () {

        Route::get('/', [PlayerController::class, 'index'])->name('playersList');
        Route::get('/novo', [PlayerController::class, 'new'])->name('playersNew');
        Route::get('/{id}', [PlayerController::class, 'form'])->name('playersForm');
        Route::post('/', [PlayerController::class, 'store'])->name('playersInsert');
        Route::put('/{id}', [PlayerController::class, 'update'])->name('playersUpdate');
        Route::delete('/{id}', [PlayerController::class, 'destroy'])->name('playersDelete');
        
    });

    Route::prefix('partidas')->group(function () {

        Route::get('/', [GameController::class, 'index'])->name('gamesList');
        Route::get('/novo', [GameController::class, 'new'])->name('gamesNew');
        Route::get('/{id}', [GameController::class, 'form'])->name('gamesForm');
        Route::post('/', [GameController::class, 'store'])->name('gamesInsert');
        Route::put('/{id}', [GameController::class, 'update'])->name('gamesUpdate');
        Route::delete('/{id}', [GameController::class, 'destroy'])->name('gamesDelete');
        
    });

    Route::prefix('banners')->group(function () {

        Route::get('/', [BannerController::class, 'index'])->name('bannersList');
        Route::get('/novo', [BannerController::class, 'new'])->name('bannersNew');
        Route::get('/{id}', [BannerController::class, 'form'])->name('bannersForm');
        Route::post('/', [BannerController::class, 'store'])->name('bannersInsert');
        Route::put('/{id}', [BannerController::class, 'update'])->name('bannersUpdate');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('bannersDelete');
        
    });

    Route::prefix('secoes')->group(function () {

        Route::get('/', [SectionController::class, 'index'])->name('sectionsList');
        Route::get('/novo', [SectionController::class, 'new'])->name('sectionsNew');
        Route::get('/{id}', [SectionController::class, 'form'])->name('sectionsForm');
        Route::post('/', [SectionController::class, 'store'])->name('sectionsInsert');
        Route::put('/{id}', [SectionController::class, 'update'])->name('sectionsUpdate');
        Route::delete('/{id}', [SectionController::class, 'destroy'])->name('sectionsDelete');
        Route::delete('/{id}/images/{image}', [SectionController::class, 'destroyImage'])->name('sectionsDeleteImage');
        
    });

    Route::prefix('postagens')->group(function () {

        Route::get('/', [PostController::class, 'index'])->name('postsList');
        Route::get('/novo', [PostController::class, 'new'])->name('postsNew');
        Route::get('/{id}', [PostController::class, 'form'])->name('postsForm');
        Route::post('/', [PostController::class, 'store'])->name('postsInsert');
        Route::put('/{id}', [PostController::class, 'update'])->name('postsUpdate');
        Route::delete('/{id}', [PostController::class, 'destroy'])->name('postsDelete');
        Route::delete('/{id}/images/{image}', [PostController::class, 'destroyImage'])->name('postsDeleteImage');
        
    });

    Route::prefix('parametros')->group(function () {

        Route::get('/', [ParameterController::class, 'index'])->name('parametersList');
        Route::get('/{id}', [ParameterController::class, 'form'])->name('parametersForm');
        Route::put('/{id}', [ParameterController::class, 'update'])->name('parametersUpdate');
        
    });

    Route::prefix('questionarios')->group(function () {

        Route::get('/', [QuizController::class, 'index'])->name('quizzesList');
        Route::get('/novo', [QuizController::class, 'new'])->name('quizzesNew');
        Route::get('/{id}', [QuizController::class, 'form'])->name('quizzesForm');
        Route::post('/', [QuizController::class, 'store'])->name('quizzesInsert');
        Route::put('/{id}', [QuizController::class, 'update'])->name('quizzesUpdate');
        Route::delete('/{id}', [QuizController::class, 'destroy'])->name('quizzesDelete');

        Route::get('/{id}/questoes/novo', [QuizController::class, 'newQuestion'])->name('quizQuestionsNew');
        Route::get('/{id}/questoes/{question_id}', [QuizController::class, 'formQuestion'])->name('quizQuestionsForm');
        Route::post('/{id}/questoes', [QuizController::class, 'storeQuestion'])->name('quizQuestionsInsert');
        Route::put('/{id}/questoes/{question_id}', [QuizController::class, 'updateQuestion'])->name('quizQuestionsUpdate');
        Route::delete('/{id}/questoes/{question_id}', [QuizController::class, 'destroyQuestion'])->name('quizQuestionsDelete');
        
    });

    Route::prefix('avaliacoesindividuais')->group(function () {

        Route::get('/', [IndividualAssesmentController::class, 'index'])->name('individualAssesmentsList');
        Route::get('/{id}', [IndividualAssesmentController::class, 'show'])->name('individualAssesmentsShow');
        
    });

    Route::prefix('avaliacoescoletivas')->group(function () {

        Route::get('/', [CollectiveAssesmentController::class, 'index'])->name('collectiveAssesmentsList');
        Route::get('/{id}', [CollectiveAssesmentController::class, 'show'])->name('collectiveAssesmentsShow');
        
    });

    Route::get('em-construcao', [UnderConstructionController::class, 'index'])->name('underConstruction');

});

Route::get('imagem/{path}', [ImageController::class, 'get'])->name('image');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');