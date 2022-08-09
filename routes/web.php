<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

/* Rotte Pubbliche */
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/visualizza/{name}/{id}/annunci' , [PublicController::class , 'announceByCategory'])->name('announcement.index');
Route::get('/search' , [PublicController::class , 'search'])->name('search');
Route::get('/users' , [PublicController::class , 'users'])->name('users');

// Rotte annunci
Route::get('/annunci/crea', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::get('/annunci/crea', [AnnouncementController::class, 'newAnnouncement'])->name('announcement.create');
Route::get('/annunci/all', [AnnouncementController::class, 'announcementAll'])->name('announcement.all');
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');
Route::post('/annunci/store', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/annunci/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

// Revisor area 
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');

//Delete announce area
Route::get('/revisor/delete', [RevisorController::class, 'delete'])->name('revisor.delete');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/cancel', [RevisorController::class, 'cancel'])->name('revisor.cancel');

//CONTACTS
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contatti/submit', [PublicController::class, 'submit'])->name('submit');
Route::post('/locale/{locale}' , [PublicController::class , 'locale'])->name('locale');

