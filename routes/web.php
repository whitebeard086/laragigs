<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Common Resource Routes

// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Save new listing
// edit - Show form to edit listing
// update - update listing
// destroy - delete listing

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show form to create new listing
Route::get('/listings/create', [ListingController::class, 'create']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);