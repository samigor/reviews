<?php

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
  Route::get('/category/{slug?}','BlogController@category')->name('category.show');
  Route::get('/article/{slug?}','BlogController@article')->name('article');
  Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');

  Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/tags','TagsController',['as'=>'admin']);
    Route::resource('/category','CategoryController',['as'=>'admin']);
    Route::resource('/article','ArticleController',['as'=>'admin']);
      Route::group(['prefix' => 'user_management', 'namespace' => 'UserManagement'], function() {
  	     Route::resource('/user', 'UserController', ['as' => 'admin.user_management']);
        });
      Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
      });

Route::group(['middleware'	=>	'auth'], function(){
          Route::post('/comment', 'CommentsController@store');
      });

// Route::post('/image/upload','ImageController@upload')->name('image.upload');
Route::get('/about', function(){return view('about');});
Route::get('/contact', function(){return view('contact');});
Route::post('/mail', 'MailController@send_mail');
Route::get('/', 'HomeController@index', function () { return view('home');});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Route::get('send', 'MailController@send');
// Email related routes
//Route::get('mail/send', 'MailController@send');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
