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

Route::get('/',[
    "uses"=>"FrontendController@index",
    "as"=>"index"
]);

Route::get("/post/{slug}",[
    "uses"=>"FrontendController@single",
    "as"=>"post.single"
]);

Route::get("/category/{id}",[
    "uses"=>"FrontendController@category",
    "as"=>"category.single"
]);

Route::get("/tag/{id}",[
    "uses"=>"FrontendController@tag",
    "as"=>"tag.single"
]);

Route::get("/results",[
    "uses"=>"FrontendController@search",
    "as"=>"search"
]);

Route::post("/subscribe",[
    "uses"=>"FrontendController@subscribe",
    "as"=>"subscribe"
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Post
Route::resource("posts","PostsController");

Route::get("/transhed",[
    "uses"=>"PostsController@trashed",
    "as"=>"posts.trashed"
]);
Route::get("/restore-posts/{id}",[
    "uses"=>"PostsController@restore",
    "as"=>"posts.restore"
]);
Route::get("/destroy-posts/{id}",[
    "uses"=>"PostsController@kill",
    "as"=>"posts.kill"
]);

//Category
Route::get("/categories",[
    "uses"=>"CategoryController@index",
    "as"=>"categories"
]);
Route::get("/categories/{category}/edit",[
    "uses"=>"CategoryController@edit",
    "as"=>"categories.edit"
]);
Route::put("/categories/{category}/update",[
    "uses"=>"CategoryController@update",
    "as"=>"categories.update"
]);
Route::delete("/Categories/{category}/delete",[
    "uses"=>"CategoryController@delete",
    "as"=>"categories.delete"
]);


Route::get("/categories-create",[
    "uses"=>"CategoryController@create",
    "as"=>"categories.create"
]);
Route::post("/categories-create/store",[
    "uses"=>"CategoryController@store",
    "as"=>"categories.store"
]);



Route::get("/settings",[
    "uses"=>"SettingsController@index",
    "as"=>"admin.settings"
]);

Route::post("/settings/update",[
    "uses"=>"SettingsController@update",
    "as"=>"settings.update"
]);

Route::get("/users",[
    "uses"=>"UsersController@index",
    "as"=>"admin.users"
]);

Route::get("/users/admin/{user}",[
    "uses"=>"UsersController@admin",
    "as"=>"user.admin"
]);
Route::get("/users/not_admin/{user}",[
    "uses"=>"UsersController@not_admin",
    "as"=>"user.not_admin"
]);
Route::get("/users/delete/{user}",[
    "uses"=>"UsersController@destroy",
    "as"=>"user.delete"
]);

Route::get("/new-user",[
    "uses"=>"UsersController@create",
    "as"=>"new_user"
]);

Route::post("/store-user",[
    "uses"=>"UsersController@store",
    "as"=>"user.store"
]);

Route::get('user/profile',[
    "uses"=>"ProfilesController@index",
    "as"=>"user.profile"
]);

Route::post('/user/profile/update',[
    'uses'=>"ProfilesController@update",
    'as'=>"user.profile.update"
]);

Route::get("/search/posts",[
    "uses"=>"PostsController@search",
    "as"=>"search.posts"
]);





Route::get("/tags",[
    "uses"=>"TagsController@index",
    "as"=>"tags.index"
]);

Route::get("/tags-create",[
    "uses"=>"TagsController@create",
    "as"=>"tags.create"
]);
Route::post("/tags-create/store",[
    "uses"=>"TagsController@store",
    "as"=>"tags.store"
]);
Route::get("/tags/{tag}/edit",[
    "uses"=>"TagsController@edit",
    "as"=>"tags.edit"
]);
Route::put("/tags/{tag}/update",[
    "uses"=>"TagsController@update",
    "as"=>"tags.update"
]);
Route::delete("/tags/{tag}/delete",[
    "uses"=>"TagsController@delete",
    "as"=>"tags.delete"
]);



