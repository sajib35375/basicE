<?php

use App\Models\Brand;
use App\Models\Multi;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = Brand::all();
    $services = Service::all();
    $multi_pic = Multi::all();
    return view('home',compact('data','services','multi_pic'));
})->name('home');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $user = User::all();
    return view('admin.index');
})->name('dashboard');


Route::get('category',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
Route::post('category/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
Route::get('category/softdelete/{id}',[App\Http\Controllers\CategoryController::class,'softdelete'])->name('category.softdelete');
Route::get('category/restore/{id}',[App\Http\Controllers\CategoryController::class,'restore'])->name('category.restore');
Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');

Route::get('brand/all',[App\Http\Controllers\BrandController::class,'AllBrand'])->name('brand.all');
Route::post('brand/store',[App\Http\Controllers\BrandController::class,'Store'])->name('brand.store');
Route::get('brand/edit/{id}',[App\Http\Controllers\BrandController::class,'Edit'])->name('brand.edit');
Route::post('brand/update/{id}',[App\Http\Controllers\BrandController::class,'update'])->name('brand.update');
Route::get('brand/delete/{id}',[App\Http\Controllers\BrandController::class,'delete'])->name('brand.delete');

Route::get('multi/image',[App\Http\Controllers\BrandController::class,'multiImage'])->name('multi.image');
Route::post('multi/store',[App\Http\Controllers\BrandController::class,'multiStore'])->name('multi.store');



Route::get('user/logout',[App\Http\Controllers\LogoutController::class,'userLogout'])->name('user.logout');

Route::get('home/slider',[App\Http\Controllers\HomeController::class,'HomeSlider'])->name('home.slider');
Route::post('slider/store',[App\Http\Controllers\HomeController::class,'SliderStore'])->name('slider.store');
Route::get('slider/show',[App\Http\Controllers\HomeController::class,'SliderShow'])->name('slider.show');
Route::get('slider/delete/{id}',[App\Http\Controllers\HomeController::class,'SliderDelete'])->name('slider.delete');

Route::get('home/about',[App\Http\Controllers\AboutController::class,'HomeAbout'])->name('home.about');
Route::get('home/create',[App\Http\Controllers\AboutController::class,'homeCreate'])->name('home.create');
Route::post('home/store',[App\Http\Controllers\AboutController::class,'homeStore'])->name('home.store');

Route::get('service',[App\Http\Controllers\ServiceController::class,'index'])->name('service.index');
Route::get('service/create',[App\Http\Controllers\ServiceController::class,'create'])->name('service.create');
Route::post('service/store',[App\Http\Controllers\ServiceController::class,'store'])->name('service.store');

Route::get('portfolio',[App\Http\Controllers\PortfolioController::class,'Portfolio'])->name('portfolio');

Route::get('contact/index',[App\Http\Controllers\ContactController::class,'index'])->name('contact.index');
Route::get('contact/create',[App\Http\Controllers\ContactController::class,'create'])->name('contact.create');
Route::post('contact/store',[App\Http\Controllers\ContactController::class,'store'])->name('contact.store');
Route::get('contact/show',[App\Http\Controllers\ContactController::class,'ContactShow'])->name('contact.show');
Route::post('user/contact',[App\Http\Controllers\ContactController::class,'userContact'])->name('user.contact');
Route::get('user/info',[App\Http\Controllers\ContactController::class,'userInfo'])->name('user.info');

Route::get('change/password',[App\Http\Controllers\ChangePassController::class,'ChangePass'])->name('change.password');
Route::post('password/update',[App\Http\Controllers\ChangePassController::class,'PasswordUpdate'])->name('update.password');

Route::get('profile',[App\Http\Controllers\ProfileController::class,'profile'])->name('profile.show');
Route::post('profile/update',[App\Http\Controllers\ProfileController::class,'profileUpdate'])->name('profile.update');
