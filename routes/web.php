<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Contacts
Route::middleware('auth')->group(function () {
    Route::get('/contacts', [ContactsController::class, "getContacts"])->name("contacts.index");
    Route::get('/contacts/create', [ContactsController::class, "addNewContact"])->name("contacts.create");
    Route::post('/contacts/create', [ContactsController::class, "storeNewContact"])->name("contacts.store");
    Route::get('/contacts/{id}', [ContactsController::class, "showContact"])->name("contacts.show");
    Route::delete('/contacts/{id}', [ContactsController::class, "deleteContact"])->name("contacts.destroy");
    Route::get('/contacts/{id}/edit', [ContactsController::class, "editContact"])->name("contacts.edit");
    Route::put('/contacts/{id}', [ContactsController::class, "updateContact"])->name("contacts.update");
});


// Companies
Route::resource("/companies", CompanyController::class)->middleware("auth");

// Auth
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Some Tests
Route::get('/test', [ContactsController::class, "eloquentTests"]);

// Trash
Route::group(["prefix"=>"trash", "middleware"=>"auth"], function(){
    // Contacts
    Route::get('/contacts', [ContactsController::class, "getDeletedContacts"]);
    Route::delete('/contacts/{id}', [ContactsController::class, "forceDeleteContact"])->name("contacts.forceDelete");
    Route::put('/contacts/{id}', [ContactsController::class, "restoreContact"])->name("contacts.restore");

    // Companies
    Route::get('/companies', [CompanyController::class, "getDeletedCompanies"]);
    Route::delete('/companies/{id}', [CompanyController::class, "forceDeleteCompany"])->name("companies.forceDelete");
    Route::put('/companies/{id}', [CompanyController::class, "restoreCompany"])->name("companies.restore");
});
