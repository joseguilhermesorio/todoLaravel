<?php

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('todos')->group(function() {
    Route::get('/','TodoController@index')->name('todos.index');
    Route::get('/search', 'TodoController@search')->name('todos.search');
    Route::get('/show/{todo}', 'TodoController@show')->name('todos.show');
    Route::get('/new', 'TodoController@create')->name('todos.create');
    Route::post('/save', 'TodoController@save')->name('todos.save');
    Route::get('/edit/{todo}', 'TodoController@edit')->name('todos.edit');
    Route::put('/update/{todo}', 'TodoController@update')->name('todos.update');
    Route::get('/delete/{todo}', 'TodoController@destroy')->name('todos.delete');
    Route::get('/completed/{todo}', 'TodoController@completed')->name('todos.completed');
});