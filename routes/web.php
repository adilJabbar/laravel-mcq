<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\LoginController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\McqQuestionController as AdminMcqQuestionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Front\UserController as FrontUserController;
use App\Http\Controllers\Back\UserController as UserController;

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


Route::get('/', [AuthenticatedSessionController::class, 'create']);


Route::group(['as' => 'back.', 'prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login_post');
    Route::post('/logout', [LoginController::class, 'logoutPost'])->name('logoutPost');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/question', [AdminMcqQuestionController::class, 'index'])->name('question');
        Route::post('/question-post', [AdminMcqQuestionController::class, 'QuestionPost'])->name('question_post');
        Route::post('/question-generate', [AdminMcqQuestionController::class, 'QuestionGenerate'])->name('questions_generate');
        
         /**User List With Report*/
        Route::get('/users/list', [UserController::class, 'index'])->name('user_list');
    });
  
    
    
});
Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/dashboard', [FrontUserController::class, 'index'])->name('dashboard');
    Route::post('/mcq-attempt', [FrontUserController::class, 'mcqAttempPost'])->name('mcq-attempt');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
