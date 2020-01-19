<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\PasswordSecurityController;
use App\Http\Controllers\Auth\TwoFactorResetController;
use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Teams\MembersController;
use App\Http\Controllers\Teams\TeamController;
use App\Http\Controllers\Users\Account\ApiTokenController;
use App\Http\Controllers\Users\AccountController;
use App\Http\Controllers\VolunteerController;

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
Route::get('/home', 'HomeController@index')->name('home');

// Activity routes
Route::get('{user}/logs', [ActivityController::class, 'show'])->name('users.activity');

// Notification routes
Route::get('/notificaties/markAll', [NotificationController::class, 'markAll'])->name('notifications.markAll');
Route::get('/notificaties/markOne/{notification}', [NotificationController::class, 'markOne'])->name('notifications.markAsRead');
Route::get('/notificaties/{type?}', [NotificationController::class, 'index'])->name('notifications.index');

// User Settings routes
Route::get('/account', [AccountController::class, 'index'])->name('account.settings');
Route::get('/account/beveiliging', [AccountController::class, 'indexSecurity'])->name('account.security');
Route::patch('/account/informatie', [AccountController::class, 'updateInformation'])->name('account.settings.info');
Route::patch('/account/beveiliging', [AccountController::class, 'updateSecurity'])->name('account.settings.security');
Route::get('/account/api-tokens', [ApiTokenController::class, 'index'])->name('account.api-tokens');

// Team routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::get('/team-toevoegen', [TeamController::class, 'create'])->name('teams.create');
Route::post('/team-toevoegen', [TeamController::class, 'store'])->name('teams.store');
Route::match(['get', 'delete'], '/teams/{team}/verwijderen', [TeamController::class, 'destroy'])->name('teams.delete');

// Volunteer routes
Route::get('/vrijwilligers/{filter?}', [VolunteerController::class, 'index'])->name('volunteer.index');
Route::get('nieuwe-vrijwilliger', [VolunteerController::class, 'create'])->name('volunteer.create');

// Member routes
Route::get('/{team}/leden', [MembersController::class, 'index'])->name('teams.members.show');

// Notes Routes
Route::get('/notities', [NoteController::class, 'index'])->name('notes.index');

// Project routes
Route::get('/projecten', [ProjectController::class, 'index'])->name('projects.index');

// 2FA routes
Route::post('/gebruiker/genereer-2fa-token', [PasswordSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
Route::post('/gebruiker/2fa', [PasswordSecurityController::class, 'enable2fa'])->name('enable2fa');
Route::post('/gebruiker/deactiveer-2fa', [PasswordSecurityController::class, 'disable2fa'])->name('disable2fa');
Route::get('/2fa-herstel', [TwoFactorResetController::class, 'index'])->name('recovery.2fa');
Route::post('/2fa-herstel', [TwoFactorResetController::class, 'request'])->name('recovery.2fa.request');
Route::get('/2fa-reset', [TwoFactorResetController::class, 'handle'])->name('2fa.reset');

Route::post('/2faVerify', static function () {
    return redirect()->route('home');
})->name('2faVerify')->middleware('2fa');
