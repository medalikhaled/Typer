<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\UserController;

// 
// 


// 
// 



/* la route pour Afficher un seul projet faut étre sous '/listings/create' et '/listings' sinon create va étre considéré comme un caractére génerale 'listing'*/




//Afficher tous les projets de rédaction
Route::get('/', [ListingController::class, 'index']);

//afficher la forum de la creation d'un nouvel projet
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//stocker les données de projet (listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
