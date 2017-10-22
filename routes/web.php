<?php
Route::get('/', function () {
    return view('phonebook');
});

Route::resource('phonebook', 'PhonebookController');

Route::get('/{name}', function() {
    return redirect('/');
})->where('name', '[A-Za-z]+');