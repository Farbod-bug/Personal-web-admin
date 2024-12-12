<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyInfoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceDescriptionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SubTitleController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');


Route::prefix('my_info')->middleware('auth')->group(function () {
    Route::get('/', [MyInfoController::class, 'index'])->name('myInfo.index');
    Route::get('/{myinfo}/edit', [MyInfoController::class, 'edit'])->name('myInfo.edit');
    Route::get('/{myinfo}/show', [MyInfoController::class, 'show'])->name('myInfo.show');
    Route::put('/{myinfo}', [MyInfoController::class, 'update'])->name('myInfo.update');
});

Route::prefix('skills')->middleware('auth')->group(function () {
    Route::get('/', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/create', [SkillController::class, 'create'])->name('skills.create');
    Route::get('/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::post('/', [SkillController::class, 'store'])->name('skills.store');
    Route::put('/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
});

Route::prefix('sub-title')->middleware('auth')->group(function () {
    Route::get('/', [SubTitleController::class, 'index'])->name('subtitle.index');
    Route::get('/create', [SubTitleController::class, 'create'])->name('subtitle.create');
    Route::get('/{SubTitle}/edit', [SubTitleController::class, 'edit'])->name('subtitle.edit');
    Route::post('/', [SubTitleController::class, 'store'])->name('subtitle.store');
    Route::put('/{SubTitle}', [SubTitleController::class, 'update'])->name('subtitle.update');
    Route::delete('/{SubTitle}', [SubTitleController::class, 'destroy'])->name('subtitle.destroy');

});

Route::prefix('services')->middleware('auth')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/{Service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('/{Service}/show', [ServiceController::class, 'show'])->name('service.show');
    Route::post('/', [ServiceController::class, 'store'])->name('service.store');
    Route::put('/{Service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/{Service}', [ServiceController::class, 'destroy'])->name('service.destroy');

});

Route::prefix('services/description')->middleware('auth')->group(function () {
    Route::get('/{Service}', [ServiceDescriptionController::class, 'index'])->name('service.description.index');
    Route::get('/{Service}/create', [ServiceDescriptionController::class, 'create'])->name('service.description.create');
    Route::post('/', [ServiceDescriptionController::class, 'store'])->name('service.description.store');
    Route::get('/{ServiceDescription}/edit', [ServiceDescriptionController::class, 'edit'])->name('service.description.edit');
    Route::put('/{ServiceDescription}', [ServiceDescriptionController::class, 'update'])->name('service.description.update');
    Route::delete('/{ServiceDescription}', [ServiceDescriptionController::class, 'destroy'])->name('service.description.destroy');
});

Route::prefix('portfolio')->middleware('auth')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::get('/{Portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::get('/{Portfolio}/show', [PortfolioController::class, 'show'])->name('portfolio.show');
    Route::post('/', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::put('/{Portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/{Portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::get('/{image}/delete', [PortfolioController::class, 'deleteImage'])->name('portfolio.image.destroy');

});

Route::prefix('contact-us')->middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/{contact}/show', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/{contact}/check', [ContactController::class, 'check'])->name('contact.check');
    Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/checkeds', [ContactController::class, 'checkeds'])->name('contact.checkeds');
    Route::get('/uncheckeds', [ContactController::class, 'uncheckeds'])->name('contact.uncheckeds');

});

Route::prefix('users')->middleware(['auth', 'access.level'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/{user}/edit-password', [UserController::class, 'editPass'])->name('users.editPss');
    Route::put('/{user}/updatePass', [UserController::class, 'updatePass'])->name('users.updatePass');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
