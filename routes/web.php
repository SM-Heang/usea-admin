<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleGroupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\EventsImagesController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipCategoryController;
use App\Http\Controllers\StudyTourController;
use App\Http\Controllers\StudyTourImagesController;
use Illuminate\Support\Facades\Route;

// set active sidebar
// function set_active($route){
//   if(is_array($route)){
//     return in_array(Request::path(), $route) ? 'active' : '';
//   }
//   return Request::path() == $route ? 'active' : '';
// }

Route::get('/', [Controller::class, 'index'])->name('dashboard');

//user management route
Route::controller(UsersController::class)->middleware('auth')->group(function () {
  Route::get('/user', 'index')->name('users.index');
  Route::get('/create-user','create')->name('users.create');
  Route::post('/post-user','store')->name('users.store');
  Route::get('/user/{id}', 'edit')->name('users.edit');
  Route::put('/user/{id}', 'update')->name('users.update');
  Route::delete('/user/{id}', 'destroy')->name('users.destroy');
});

//article route 
Route::controller(ArticleController::class)->middleware('auth')->group(function () {
  Route::get('/index','index')->name('articles.index');
  Route::get('/post','create')->name('articles.create');
  Route::post('/article','store')->name('articles.store');
  Route::get('/article/{id}', 'edit')->name('articles.edit');
  Route::put('/article/{id}', 'update')->name('articles.update');
  Route::delete('/article/{id}', 'destroy')->name('articles.destroy');
});

//article category route 
Route::controller(ArticleCategoryController::class)->middleware('auth')->group(function () {
  Route::get('/home-article-category','index')->name('articles.categories.index');
  Route::get('/post-category','create')->name('articles.categories.create');
  Route::post('/article-category','store')->name('articles.categories.store');
  Route::get('/article-category/{id}', 'edit')->name('articles.categories.edit');
  Route::put('/article-category/{id}', 'update')->name('articles.categories.update');
  Route::delete('/article-category/{id}', 'destroy')->name('articles.categories.destroy');
});

//article group route 
Route::controller(ArticleGroupController::class)->middleware('auth')->group(function () {
  Route::get('/home-article-group','index')->name('articles.group.index');
  Route::get('/post-group','create')->name('articles.group.create');
  Route::post('/article-group','store')->name('articles.group.store');
  Route::get('/article-group/{id}', 'edit')->name('articles.group.edit');
  Route::put('/article-group/{id}', 'update')->name('articles.group.update');
  Route::delete('/article-group/{id}', 'destroy')->name('articles.group.destroy');
});

//event route
Route::controller(EventsController::class)->middleware('auth')->group(function () {
  Route::get('/events', 'index')->name('events.index');
  Route::get('/create-event','create')->name('events.create');
  Route::post('/post-event','store')->name('events.store');
  Route::get('/event/{id}', 'edit')->name('events.edit');
  Route::put('/event/{id}', 'update')->name('events.update');
  Route::delete('/event/{id}', 'destroy')->name('events.destroy');
});

//event images route
Route::controller(EventsImagesController::class)->middleware('auth')->group(function () {
  Route::get('/events-images', 'index')->name('events.images.index');
  Route::get('/create-event-images','create')->name('events.images.create');
  Route::post('/post-event-images','store')->name('events.images.store');
  Route::get('/event-images/{id}', 'edit')->name('events.images.edit');
  Route::put('/event-images/{id}', 'update')->name('events.images.update');
  Route::delete('/event-images/{id}', 'destroy')->name('events.images.destroy');
});

//partnership route
Route::controller(PartnershipController::class)->middleware('auth')->group(function () {
  Route::get('/partnership', 'index')->name('partnership.index');
  Route::get('/create-partnership','create')->name('partnership.create');
  Route::post('/post-partnership','store')->name('partnership.store');
  Route::get('/partnership/{id}', 'edit')->name('partnership.edit');
  Route::put('/partnership/{id}', 'update')->name('partnership.update');
  Route::delete('/partnership/{id}', 'destroy')->name('partnership.destroy');
});

//scholarship route
Route::controller(ScholarshipController::class)->middleware('auth')->group(function () {
  Route::get('/scholarship', 'index')->name('scholarship.index');
  Route::get('/create-scholarship','create')->name('scholarship.create');
  Route::post('/post-scholarship','store')->name('scholarship.store');
  Route::get('/scholarship/{id}', 'edit')->name('scholarship.edit');
  Route::put('/scholarship/{id}', 'update')->name('scholarship.update');
  Route::delete('/scholarship/{id}', 'destroy')->name('scholarship.destroy');
});

//scholarship route
Route::controller(ScholarshipCategoryController::class)->middleware('auth')->group(function () {
  Route::get('/scholarship-category', 'index')->name('scholarship.categories.index');
  Route::get('/create-scholarship-category','create')->name('scholarship.categories.create');
  Route::post('/post-scholarship-category','store')->name('scholarship.categories.store');
  Route::get('/scholarship-category/{id}', 'edit')->name('scholarship.categories.edit');
  Route::put('/scholarship-category/{id}', 'update')->name('scholarship.categories.update');
  Route::delete('/scholarship-category/{id}', 'destroy')->name('scholarship.categories.destroy');
});

//scholarship route
Route::controller(ScholarshipCategoryController::class)->middleware('auth')->group(function () {
  Route::get('/scholarship-group', 'index')->name('scholarship.group.index');
  Route::get('/create-scholarship-group','create')->name('scholarship.group.create');
  Route::post('/post-scholarship-group','store')->name('scholarship.group.store');
  Route::get('/scholarship-group/{id}', 'edit')->name('scholarship.group.edit');
  Route::put('/scholarship-group/{id}', 'update')->name('scholarship.group.update');
  Route::delete('/scholarship-group/{id}', 'destroy')->name('scholarship.group.destroy');
});

//study-tour route
Route::controller(StudyTourController::class)->middleware('auth')->group(function () {
  Route::get('/study-tour', 'index')->name('study-tour.index');
  Route::get('/create-study-tour','create')->name('study-tour.create');
  Route::post('/post-study-tour','store')->name('study-tour.store');
  Route::get('/study-tour/{id}', 'edit')->name('study-tour.edit');
  Route::put('/study-tour/{id}', 'update')->name('study-tour.update');
  Route::delete('/study-tour/{id}', 'destroy')->name('study-tour.destroy');
});

//study-tour images route
Route::controller(StudyTourImagesController::class)->middleware('auth')->group(function () {
  Route::get('/study-tour-image', 'index')->name('study-tour.images.index');
  Route::get('/create-study-tour-image','create')->name('study-tour.images.create');
  Route::post('/post-study-tour-image','store')->name('study-tour.images.store');
  Route::get('/study-tour-image/{id}', 'edit')->name('study-tour.images.edit');
  Route::put('/study-tour-image/{id}', 'update')->name('study-tour.images.update');
  Route::delete('/study-tour-image/{id}', 'destroy')->name('study-tour.images.destroy');
});

//login route 
Route::controller(AuthController::class)->group(function (){
  Route::get('/login', 'login')->name('login');
  Route::post('/authenticate', 'authenticate')->name('authenticate');
  Route::post('/logout', 'logout')->name('logout');
});

