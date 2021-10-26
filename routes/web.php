
<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function(){
    Route::resource('produtos', 'ProdutosController');

});


Route::any('/search', 'ProdutosController@search')->name('produtos.search');
Route::any('/delete', 'ProdutosController@delete')->name('produtos.delete');