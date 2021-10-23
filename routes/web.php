<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\mainPageController::class, 'index'])->name('main');
Route::get('/registration', function () {
    return view('registration');
})->name('registration');
Route::get('/auth', function () {
    return view('auth');
})->name('autht');
Route::get('/shoppingcart', function () {
    return view('shoppingcart');
})->name('shoppingcart');



Route::get('/catalog/', [\App\Http\Controllers\CategoryController::class, 'getCategories'])->name('catalog');
Route::get('/catalog/{CategoryName}', [\App\Http\Controllers\CategoryController::class, 'getSubcategory'])->name('subcatalog');

Route::get('/catalog/{CategoryName}/{SubcategoryNameFor}/1', [\App\Http\Controllers\CategoryController::class, 'getSubcategory2'])->name('subcatalog2');
Route::get('/catalog/{CategoryName}/{SubcategoryName}', [\App\Http\Controllers\CategoryController::class, 'getGoods'])->name('goods');

Route::get('/catalog/{CategoryName}/{SubcategoryName}/{GoodName}', [\App\Http\Controllers\CategoryController::class, 'GetItem'])->name('good');
Route::get('/personalcabinet', [\App\Http\Controllers\UserController::class, 'getThisUser'])->name('personal_cabinet');

Route::post('/add-to-cart', [\App\Http\Controllers\cartController::class, 'addToCart'])->name('addToCart');
Route::post('/remove-to-cart', [\App\Http\Controllers\cartController::class, 'removeToCart'])->name('removeToCart');
Route::post('/update-to-cart', [\App\Http\Controllers\cartController::class, 'updateToCart'])->name('updateToCart');


Route::post('/catalog/{CategoryName}/{SubcategoryName}/{GoodName}', [\App\Http\Controllers\ReviewController::class, 'addReview'])->name('addReview');

/* Бренды */
Route::get('brands', [\App\Http\Controllers\BrandController::class, 'brands'])->name('brands');
Route::get('brands/{BrandName}', [\App\Http\Controllers\BrandController::class, 'brand'])->name('brand');
/* Бренды конец */

/* личный кабинет */
Route::post('/registration', [\App\Http\Controllers\UserController::class, 'registration'])
->name('reg');
Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])
->name('auth');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])
->name('logout');
Route::post('/lc', [\App\Http\Controllers\UserController::class, 'edit'])
->name('editPerson');
/* личный кабилнет конец */


/* Блоки about */
Route::get('/about', function () {
    return view('about.aboutShop');
})
->name('about');
Route::get('/contacts', function () {
    return view('contacts.contacts');
})
->name('contacts');
/* Блоки about end */