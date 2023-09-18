<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GammeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\EvenementController;

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
Auth::routes();

//Accueil
Route::get('/', [HomeController::class, 'index'])->name('home'); //permet de renvoyer vers l'accueil
Route::get('/contact', [HomeController::class, 'contact'])->name('contact'); //permet de renvoyer vers la page contact
Route::get('/concept', [HomeController::class, 'concept'])->name('concept'); //permet de renvoyer vers la page Notre concept
Route::get('/espacebarjeux', [HomeController::class, 'espacebarjeux'])->name('espacebarjeux'); //permet de renvoyer vers la page Espace Bar & Jeux
Route::get('/shop', [HomeController::class, 'shop'])->name('shop'); //permet de renvoyer vers la page intro du shop

//User
Route::resource('/users', UserController::class)->except('index', 'create', 'store','show');

//Commandes
Route::resource('/commandes', CommandeController::class)->except('edit', 'update', 'destroy');

//Evenements
Route::resource('/evenements', EvenementController::class)->except('create');
Route::resource('/reservations', App\Http\Controllers\ReservationController::class)->except('create', 'show', 'edit', 'update');

//Articles
Route::resource('/articles', ArticleController::class)->except('create');

//Gammes
Route::resource('/gammes', GammeController::class)->except('show', 'create');

//Panier
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart/empty', [CartController::class, 'empty'])->name('cart.empty');
Route::get('cart/emptyAfterOrder', [CartController::class, 'emptyAfterOrder'])->name('cart.emptyAfterOrder');
Route::get('cart/validation', [CartController::class, 'validation'])->name('validation');
Route::post('cart/validation', [CartController::class, 'validation'])->name('cart.validation');
Route::post('cart/creneau', [CartController::class, 'creneau'])->name('cart.creneau');

//Admin
Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');