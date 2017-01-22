<?php

Route::get('/painel/produtos/testes', 'Painel\ProductController@testes');

Route::resource('/painel/produtos','Painel\ProductController');
Route::group(['namespace' => 'Site'], function() {
    Route::get('/categoria2/{id?}', 'SiteController@categoriaop');
    Route::get('/contato', 'SiteController@contato');
});

Route::get('/categoria/{id}', 'SiteController@categoria');

Route::get('/', 'SiteController@index');

