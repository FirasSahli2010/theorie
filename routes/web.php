<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::prefix('admin')->group(function () {
  Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin_index'); // Matches The "/manage/" URL; // Matches The "/admin/" URL

  Route::get('home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

  Route::get('/index', function(){
    return view('admin.index');
  });

  Route::resource('exams', 'App\Http\Controllers\ExamAdminController');
  Route::get('/exams/{exam}/delete/', 'App\Http\Controllers\ExamAdminController@destroy')->where('page', '[0-9]+');
  Route::get('/exams/{exam}/restore/', 'App\Http\Controllers\ExamAdminController@restore')->where('page', '[0-9]+');
  Route::get('/exams/{exam}/enable', 'App\Http\Controllers\ExamAdminController@enable');
  Route::get('/exams/{exam}/disable', 'App\Http\Controllers\ExamAdminController@disable');
  Route::get('/exams/{exam}/details', 'App\Http\Controllers\ExamAdminController@show');
  Route::get('/exams/myExamDeleteAll', 'App\Http\Controllers\ExamAdminController@deleteAll');

  Route::get('/post/mypostDeleteAll', 'App\Http\Controllers\PostsController@deleteAll');

  Route::get('/post/update/{post}', 'App\Http\Controllers\PostsController@update')->where('post', '[0-9]+');

  Route::get('/post/add/', 'App\Http\Controllers\PostsController@add');

  Route::get('/post/{post}/delete/', 'App\Http\Controllers\PostsController@destroy')->where('page', '[0-9]+');

  Route::get('/post/{post}/permdelete/', 'App\Http\Controllers\PostsController@permdelete')->where('page', '[0-9]+');
  Route::get('/post/{post}/restore/', 'App\Http\Controllers\PostsController@restore')->where('page', '[0-9]+');
  Route::get('/post/{post}/enable', 'App\Http\Controllers\PostsController@enable');
  Route::get('/post/{post}/disable', 'App\Http\Controllers\PostsController@disable');
  // Route::POST('post', 'App\Http\Controllers\PostsController@create');
  Route::resource('post', 'App\Http\Controllers\PostsController');



  Route::get('/currency/', 'App\Http\Controllers\CurrencyController@index')->name('index');
  Route::get('/currency/{currency}/edit/', 'App\Http\Controllers\CurrencyController@edit')->where('currency', '[0-9]+');
  Route::put('/currency/{currency}/', 'App\Http\Controllers\CurrencyController@update')->where('currency', '[0-9]+');

  Route::get('/category/mycategoryDeleteAll', 'App\Http\Controllers\CategoriesController@deleteAll');

  Route::get('/category/add/', 'App\Http\Controllers\CategoriesController@add');

  Route::get('/category/{category}/delete/', 'App\Http\Controllers\CategoriesController@destroy')->where('category', '[0-9]+');

  Route::get('/category/{category}/permdelete/', 'App\Http\Controllers\CategoriesController@permdelete')->where('category', '[0-9]+');
  Route::get('/category/{category}/restore/', 'App\Http\Controllers\CategoriesController@restore')->where('category', '[0-9]+');
  Route::get('/category/{category}/enable', 'App\Http\Controllers\CategoriesController@enable');
  Route::get('/category/{category}/disable', 'App\Http\Controllers\CategoriesController@disable');
  Route::post('/category/fetch/', 'App\Http\Controllers\CategoriesController@fetch');

  Route::put('/category/{category}', 'App\Http\Controllers\CategoriesController@update')->where('category', '[0-9]+');

  Route::resource('category', 'App\Http\Controllers\CategoriesController');


  Route::get('/language/{language}/set_default', 'App\Http\Controllers\LanguagesController@set_default');
  Route::get('/language/{language}/enable', 'App\Http\Controllers\LanguagesController@enable');
  Route::get('/language/{language}/disable', 'App\Http\Controllers\LanguagesController@disable');
  Route::get('/language/getlist/{lang}', 'App\Http\Controllers\LanguagesController@get_language_name')->where('lang', '[0-9]+');
  Route::get('/language/getlist', 'App\Http\Controllers\LanguagesController@get_language_list');
  Route::get('/language/update/{language}', 'App\Http\Controllers\LanguagesController@update')->where('lang', '[0-9]+');

  Route::get('/language/add/', 'App\Http\Controllers\LanguagesController@add');

  Route::resource('language', 'App\Http\Controllers\LanguagesController');

  Route::put('/site_settings/update/{item}', 'App\Http\Controllers\SiteSettingsController@update');
  Route::get('/site_settings/', 'App\Http\Controllers\SiteSettingsController@index');

  Route::get('/page/mypageDeleteAll', 'App\Http\Controllers\PagesController@deleteAll');

  Route::get('/page/update/{page}', 'App\Http\Controllers\PagesController@update')->where('page', '[0-9]+');

  Route::get('/page/add/', 'App\Http\Controllers\PagesController@add');

  Route::get('/page/{page}/delete/', 'App\Http\Controllers\PagesController@destroy')->where('page', '[0-9]+');

  Route::get('/page/{page}/permdelete/', 'App\Http\Controllers\PagesController@permdelete')->where('page', '[0-9]+');
  Route::get('/page/{page}/restore/', 'App\Http\Controllers\PagesController@restore')->where('page', '[0-9]+');
  Route::get('/page/{page}/enable', 'App\Http\Controllers\PagesController@enable');
  Route::get('/page/{page}/disable', 'App\Http\Controllers\PagesController@disable');
  Route::resource('page', 'App\Http\Controllers\PagesController');

  Route::get('/menu/mymenuDeleteAll', 'App\Http\Controllers\MeunController@deleteAll');
  Route::get('/menu/{menu}/delete/', 'App\Http\Controllers\MeunController@destroy')->where('menu', '[0-9]+');
  Route::get('/menu/{menu}/enable', 'App\Http\Controllers\MeunController@enable');
  Route::get('/menu/{menu}/disable', 'App\Http\Controllers\MeunController@disable');

  Route::get('/menu/{menu}/item/{item_id}/enable', 'App\Http\Controllers\MeunItemController@enable');
  Route::get('/menu/{menu}/item/{item_id}/disable', 'App\Http\Controllers\MeunItemController@disable');

  Route::get('/menu/{menu}/item/{item_id}/delete', 'App\Http\Controllers\MeunItemController@destroy');

  Route::resource('menu.item', 'App\Http\Controllers\MeunItemController');
  Route::resource('menu', 'App\Http\Controllers\MeunController');
  Route::get('image-upload', [ 'App\Http\Controllers\ImageUploadController', 'imageUpload' ])->name('image.upload');

  Route::put('/setting/update', 'App\Http\Controllers\SettingController@update');
  Route::get('/setting/', 'App\Http\Controllers\SettingController@index');


  Route::get('/contact/mycontactDeleteAll', 'App\Http\Controllers\ContactController@deleteAll');
  Route::get('/contact/{contact}/delete/', 'App\Http\Controllers\ContactController@destroy')->where('contact', '[0-9]+');
  Route::resource('contact', 'App\Http\Controllers\ContactController');

  Route::get('/block/{block}/enable', 'App\Http\Controllers\BlockController@enable');
  Route::get('/block/{block}/disable', 'App\Http\Controllers\BlockController@disable');
  Route::get('/block/myblockDeleteAll', 'App\Http\Controllers\BlockController@deleteAll');
  Route::get('/block/{block}/delete/', 'App\Http\Controllers\BlockController@destroy')->where('menu', '[0-9]+');
  Route::resource('block', 'App\Http\Controllers\BlockController');

  Route::get('/product_category/myproduct_categoryDeleteAll', 'App\Http\Controllers\CategoriesController@deleteAll');

  Route::get('/product_category/{product_category}/delete/', 'App\Http\Controllers\ProductCategoryController@destroy')->where('product_category', '[0-9]+');

  Route::get('/product_category/{product_category}/permdelete/', 'App\Http\Controllers\ProductCategoryController@permdelete')->where('product_category', '[0-9]+');
  Route::get('/product_category/{product_category}/restore/', 'App\Http\Controllers\ProductCategoryController@restore')->where('product_category', '[0-9]+');
  Route::get('/product_category/{product_category}/enable', 'App\Http\Controllers\ProductCategoryController@enable');
  Route::get('/product_category/{product_category}/disable', 'App\Http\Controllers\ProductCategoryController@disable');

  Route::resource('product_category', 'App\Http\Controllers\ProductCategoryController');

  Route::get('/product_index/myproduct_categoryDeleteAll', 'App\Http\Controllers\ProductIndexController@deleteAll');
  Route::get('/product_index/{product_index}/delete/', 'App\Http\Controllers\ProductIndexController@destroy')->where('product_index', '[0-9]+');

  Route::get('/product_index/{product_index}/permdelete/', 'App\Http\Controllers\ProductIndexController@permdelete')->where('product_index', '[0-9]+');
  Route::get('/product_index/{product_index}/restore/', 'App\Http\Controllers\ProductIndexController@restore')->where('product_index', '[0-9]+');
  Route::get('/product_index/{product_index}/enable', 'App\Http\Controllers\ProductIndexController@enable');
  Route::get('/product_index/{product_index}/disable', 'App\Http\Controllers\ProductIndexController@disable');

  Route::resource('product_index', 'App\Http\Controllers\ProductIndexController');



  Route::get('/products/{product}/enable', 'App\Http\Controllers\ProductController@enable');
  Route::get('/products/{product}/disable', 'App\Http\Controllers\ProductController@disable');
  Route::get('/products/myProductDeleteAll', 'App\Http\Controllers\ProductController@deleteAll');
  Route::get('/products/{product}/delete/', 'App\Http\Controllers\ProductController@destroy')->where('product', '[0-9]+');
  Route::resource('products', 'App\Http\Controllers\ProductController');


  //
  Route::post('image-upload', [ 'App\Http\Controllers\ImageUploadController', 'imageUploadPost' ])->name('image.upload.post');

  Route::get('header', function () {
        // Matches The "/admin/header" URL
  });

  Route::get('user', function () {
        // Matches The "/admin/user" URL
  });
});

Route::get('/{locale?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    $today = \Carbon\Carbon::now()
        ->settings(
            [
                'locale' => app()->getLocale(),
            ]
        );
    // LL is macro placeholder for MMMM D, YYYY (you could write same as dddd, MMMM D, YYYY)
    $dateMessage = $today->isoFormat('dddd, LL');
    return view('home', [
        'date_message' => $dateMessage
    ]);
    //return view('home');
});

Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

  Route::resource('/admin/roles/', 'App\Http\Controllers\RoleController');
  Route::get('/admin/roles/{role}/edit/', 'App\Http\Controllers\RoleController@edit');
  Route::put('/admin/roles/{role}/', 'App\Http\Controllers\RoleController@update');
  Route::get('admin/roles/myroleDeleteAll', 'App\Http\Controllers\RoleController@deleteAll');
  Route::delete('/admin/roles/{role}/', 'App\Http\Controllers\RoleController@destroy');
  Route::get('/admin/roles/{role}/delete', 'App\Http\Controllers\RoleController@destroy');
    Route::resource('/admin/user', 'App\Http\Controllers\UserController');
    Route::get('/admin/user/{user}/delete/', 'App\Http\Controllers\UserController@destroy')->where('user', '[0-9]+');
    Route::get('admin/roles/myroleDeleteAll', 'App\Http\Controllers\RoleController@deleteAll');
    Route::get('admin/user/myuserDeleteAll', 'App\Http\Controllers\UserController@deleteAll');
});

Route::group(array('prefix' => Config::get('app.locale_prefix'),''), function()
{

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

});

Route::get('/category', 'App\Http\Controllers\DisplayCategoryController@index');
Route::get('/category/{slug}', 'App\Http\Controllers\DisplayCategoryController@listTopic')->where('slug', '[a-z]+');

// Route::get('/topics', 'App\Http\Controllers\DisplayTopicsController@index');
// Route::get('/topics/topic/{slug}', 'App\Http\Controllers\DisplayTopicsController@displayTopic');

// Route::get('/productcategory', 'App\Http\Controllers\DisplayProductCategoryController@index');
// Route::get('/productcategory/{slug}', 'App\Http\Controllers\DisplayProductCategoryController@listProducts');
//
// Route::get('/productcategory/{slug}/product/{product}', 'App\Http\Controllers\DisplayProductCategoryController@listProduct');
//
// Route::get('/products', 'App\Http\Controllers\DisplayProductsController@index');
// Route::POST('/products/search/', 'App\Http\Controllers\DisplayProductsController@searchName');
// Route::get('/products/search/', 'App\Http\Controllers\DisplayProductsController@searchName');
// Route::get('/products/product/{slug}', 'App\Http\Controllers\DisplayProductsController@displayProduct');
// Route::get('/products/category/{slug}', 'App\Http\Controllers\DisplayProductsController@displayCategoryProduct');




// Route::get('/pages/', 'App\Http\Controllers\DisplayPagesController@index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/{locale?}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
//         app()->setLocale($locale);
//     }
//
//     $today = \Carbon\Carbon::now()
//         ->settings(
//             [
//                 'locale' => app()->getLocale(),
//             ]
//         );
//     // LL is macro placeholder for MMMM D, YYYY (you could write same as dddd, MMMM D, YYYY)
//     $dateMessage = $today->isoFormat('dddd, LL');
//
//     return view('home', [
//         'date_message' => $dateMessage
//     ]);
// });

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
