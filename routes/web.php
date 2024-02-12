<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', [UserController::class,'displayHomepage'])->name('login');


//user related route
Route::post('/log-in',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::post('/log-out',[UserController::class,'logout']);
Route::get('/profile/{User:username}',[UserController::class,'showProfile']);
Route::get('/edit-profile',[UserController::class,'showProfileForm']);
Route::post('/edit-profile',[UserController::class,'saveProfile']);
//deck related
Route::get('/deck/{deck}',[DeckController::class,'showDeck']);
Route::get("/create-deck",[DeckController::class,'showCreateForm'])->middleware('auth');
Route::post("/create-deck",[DeckController::class,'createDeck'])->middleware('auth');

//card related
Route::get('/add-card/{deck}',[DeckController::class,'showCardForm']);
Route::post('/add-card/{deck}',[DeckController::class,'addCard']);