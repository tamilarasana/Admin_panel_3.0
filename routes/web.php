<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CategoryController;
use app\Http\Controllers\BikeModelController;
use app\Http\Controllers\BikeProductController;
use app\Http\Controllers\PostController;
use app\Http\Controllers\StudentController;
use app\Http\Controllers\ImageController;
use app\Http\Controllers\EnquiryController;
use app\Http\Controllers\SpecificationNameController;
use app\Http\Controllers\SpecificationController;
use app\Http\Controllers\VarientController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrochureController;


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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/admin', function () {
    return redirect('/category.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

//Start Banner Controller
Route::get('/banner.index', [BannerController::class,'index']);
Route::get('/banner/create', [BannerController::class,'create'])->name('banner.create');
Route::post('/banner/store/', [BannerController::class,'store'])->name('banner.store');
Route::get('/banner-delete/{id}', [BannerController::class,'destroy'])->name('banner.delete');
//End Banner Controller

//Start Category Controller
Route::get('/category.index', 'CategoryController@index')->name('category.index');
Route::get('/category.create', 'CategoryController@create')->name('category.create');
Route::post('/category.store', 'CategoryController@store')->name('category.store');
Route::get('/category-edit/{id}', 'CategoryController@edit');
Route::post('/category-update/{id}', 'CategoryController@update');
Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category.delete');
//End Category Controller

// Route::get('/category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');

//Start Bkie Models Controller
Route::get('/model.index', 'BikeModelController@index')->name('model.index');
Route::get('/model.create', 'BikeModelController@create')->name('model.create');
Route::post('/model.store', 'BikeModelController@store')->name('model.store');
Route::get('/model-edit/{id}', 'BikeModelController@edit');
Route::post('/model-update/{id}', 'BikeModelController@update');
Route::get('/model-delete/{id}', 'BikeModelController@delete');
Route::get('/model-delete/{id}', 'BikeModelController@delete')->name('model.delete');
//End Bkie Models Controller

// Start Varient Controller
Route::get('/varient.index', 'VarientController@index')->name('varient.index');
Route::get('/varient.create', 'VarientController@create')->name('varient.create');
Route::post('/varient.store', 'VarientController@store')->name('varient.store');
Route::get('/varient-edit/{id}', 'VarientController@edit');
Route::post('/varient-update/{varient}', 'VarientController@update')->name('varient.update');
Route::get('/varient-delete/{id}', 'VarientController@delete')->name('varient.delete');

Route::get('/spec-get/{id}', 'VarientController@getspecification');
Route::get('/specification-details','VarientController@getSpecificationDetails')->name('varient.getSpecificationDetails');

// End Varient Controller


//Start Bikes -products Controller
Route::get('/bike.index', 'BikeProductController@index')->name('bike.index');
Route::get('/bike.create', 'BikeProductController@create')->name('bike.create');
Route::post('/bike.store', 'BikeProductController@store')->name('bike.store');
Route::get('/bike-edit/{id}', 'BikeProductController@edit');
Route::post('/bike-update/{id}', 'BikeProductController@update');
Route::get('/bike-delete/{id}', 'BikeProductController@delete')->name('bike.delete');

// Route::get('/spec-get/{id}', 'BikeProductController@getspecification');
//End Bikes -products Controller

//Start Bike Color Controller
Route::get('/bike-colour/{id}', 'ColourController@bikecolour');
route::post('/colour.store','ColourController@store')->name('colour.store');
Route::post('/colours-update/{id}', 'ColourController@update');
//Start Bike Color Controller

//Start Enquery Controller
Route::get('/enquiry.index', 'EnquiryController@index')->name('enquiry.index');
Route::get('export','EnquiryController@export')->name("export");
//End Enquery Controller


//Start Image Controller
Route::get('/image.index', 'ImageController@index')->name('image.index');
Route::get('/create','ImageController@create');
Route::post('/post','ImageController@store');
Route::get('/image-edit/{id}', 'ImageController@edit');
Route::post('/image-update/{id}', 'ImageController@update');
Route::get('/image-delete/{id}', 'ImageController@delete')->name('image.delete');
//End Image Controller






Route::get('/specname.index', 'SpecificationNameController@index')->name('specname.index');
Route::get('/specname.create', 'SpecificationNameController@create')->name('specname.create');
Route::post('/specname.store', 'SpecificationNameController@store')->name('specname.store');
Route::get('/specname-edit/{id}', 'SpecificationNameController@edit');
Route::post('/specname-update/{id}', 'SpecificationNameController@update');
Route::get('/specname-delete/{id}', 'SpecificationNameController@delete');
Route::get('/specname-delete/{id}', 'SpecificationNameController@delete')->name('specname.delete');



Route::get('/specification.index', 'SpecificationController@index')->name('specification.index');
Route::get('/specification.create', 'SpecificationController@create')->name('specification.create');
Route::post('/specification.store', 'SpecificationController@store')->name('specification.store');
Route::post('/specification-update/{id}', 'SpecificationController@update');

// Seasons
Route::get('/season.index','SeasonController@index');
Route::get('/season.create','SeasonController@create');
Route::post('/season.store', 'SeasonController@store');
Route::get('/season-edit/{id}', 'SeasonController@edit');
Route::post('/season-update/{id}', 'SeasonController@update');
// Route::get('/season-delete/{id}', 'SeasonController@delete');
Route::get('/season-delete/{id}', 'SeasonController@delete')->name('season.delete');


//Update Seasons

Route::get('/update-season.index','UpdateSeasonController@index');
Route::get('/update-season.create','UpdateSeasonController@create');
Route::post('/update-season.store','UpdateSeasonController@store');
// Route::get('/updateseason-delete/{id}','UpdateSeasonController@delete');
Route::get('/updateseason-delete/{id}', 'UpdateSeasonController@delete')->name('updateseason.delete');


// //Brochure
// Route::get('/brochure.index',[BrochureController::class,'index']);
// Route::get('/brochure/create',[BrochureController::class,'create'])->name('brochure.create');
// Route::post('/brochure/store', [BrochureController::class,'store'])->name('brochure.store');
// Route::get('/brochure-edit/{id}', [BrochureController::class,'edit'])->name('brochure-edit');
// Route::post('/brochure/update/{id}', [BrochureController::class,'update'])->name('brochure.update');
// Route::get('/brochure-delete/{id}', [BrochureController::class,'delete'])->name('brochure-delete');














// Update Season
// Route::get('/update-season.index','SeasonController@index');







//Image

// Route::get('/image.index', 'ImageController@index')->name('image.index');
// Route::post('/image.store', 'ImageController@store')->name('image.store');
// Route::get('/fetch-employee','ImageController@fetchimage');
// Route::get('/edit-employee/{id}','ImageController@edit');
// Route::post('/update-employee/{id}','ImageController@update');
// Route::delete('/delete-employee/{id}','ImageController@destroy');


});














