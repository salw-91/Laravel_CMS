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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// route for Profile
Route::get('/profiles', 'ProfileController@index')->name('profiles');
Route::post('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
Route::get('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
Route::get('/profile/destroy/{id}', 'profileController@destroy')->name('profile.destroy');

// route for Admin Role.
Route::get('/AdminRoles', 'AdminRoleController@index')->name('AdminRoles');
Route::get('/AdminRoles/edit', 'AdminRoleController@edit')->name('AdminRole.edit');

// route for Post.
Route::get('/Post', 'PostController@index')->name('Posts');
Route::get('/Post/create', 'PostController@create')->name('post.create');
Route::get('/Post/store', 'PostController@store')->name('post.store');
Route::get('/Post/show/{id}', 'PostController@show')->name('post.show');
Route::get('/Post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::get('/Post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/Post/destroy/{id}', 'PostController@destroy')->name('post.destroy');

// route for Categorie.
Route::get('/Categorie', 'CategorieController@index')->name('Categories');
Route::get('/Categorie/create', 'CategorieController@create')->name('categorie.create');
Route::get('/Categorie/store', 'CategorieController@store')->name('categorie.store');
Route::get('/Categorie/edit/{id}', 'CategorieController@edit')->name('categorie.edit');
Route::get('/Categorie/update/{id}', 'CategorieController@update')->name('categorie.update');
Route::get('/Categorie/destroy/{id}', 'CategorieController@destroy')->name('categorie.destroy');

// route for Tag.
Route::get('/Tags', 'TagController@index')->name('Tags');
Route::get('/Tags/store', 'TagController@store')->name('tag.store');
Route::get('/Tags/destroy/{id}', 'TagController@destroy')->name('tag.destroy');



