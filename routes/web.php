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

Auth::routes();

//Home page
Route::get('/', 'UserController@getIndex');


//Dashboard
Route::get('/home', 'HomeController@index')->name('home');


//User
Route::get('/profile', 'UserController@getUserHome');

Route::get('/editprofile', 'UserController@getEditPage');
Route::put('/editprofile', 'UserController@editUser');

Route::get('/newcustomproject', 'UserController@getCustomProjectPage');
Route::post('/addcustomproject', 'UserController@addCustomProject');
Route::get('/editcustomproject/{projectID}', 'UserController@geteditCustomProjectPage');
Route::put('/editcustomproject/{projectID}', 'UserController@editCustomProject');
//Route::post('/deletecustomproject/{projectID}', 'UserController@deleteCustomProject');

Route::get('/allprojects', 'UserController@getProjectPage');
Route::post('/addprojecttoorder/{projectID}', 'UserController@addProjectToOrder');
Route::get('/addprojecttoorder/{projectID}', 'UserController@addProjectToOrder');

Route::get('/orders', 'UserController@getProjectPage');



//Worker page
Route::prefix('worker')->group(function () {
    Route::get('/', 'WorkerController@getWorkerHome');

    Route::post('/register', 'WorkerController@createWorker');

    Route::get('/delete/{id}', 'WorkerController@deleteWorker');

    Route::get('/edit/{id}', 'WorkerController@getEditPage');

    Route::post('/edit/{id}', 'WorkerController@editWorker');

    Route::post('/addProject', 'WorkerController@addProject');

    Route::get('/edit-project/{id}', 'WorkerController@getEditProjectPage');

    Route::post('/edit-project/{id}', 'WorkerController@editProject');

    Route::get('/delete-project/{id}', 'WorkerController@removeProject');

    Route::get('/accept-order/{id}', 'WorkerController@acceptOrder');

    Route::get('/deny-order/{id}', 'WorkerController@denyOrder');

    Route::get('/enable-project/{id}', 'WorkerController@enableProject');

    Route::get('/disable-project/{id}', 'WorkerController@disableProject');
});


//Admin page
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@getAdminHome');

    Route::put('/update/{id}', 'AdminController@updateUser');

});

