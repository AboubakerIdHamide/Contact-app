<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

// Contacts
Route::get('/contacts', [ContactsController::class, "getContacts"])->name("contacts.index");
Route::get('/contacts/create', [ContactsController::class, "addNewContact"])->name("contacts.create");
Route::post('/contacts/create', [ContactsController::class, "storeNewContact"])->name("contacts.store");
Route::get('/contacts/{id}', [ContactsController::class, "showContact"])->name("contacts.show");
Route::delete('/contacts/{id}', [ContactsController::class, "deleteContact"])->name("contacts.destroy");
Route::get('/contacts/{id}/edit', [ContactsController::class, "editContact"])->name("contacts.edit");
Route::put('/contacts/{id}', [ContactsController::class, "updateContact"])->name("contacts.update");


// Companies
Route::resource("/companies", CompanyController::class);