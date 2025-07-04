<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
<<<<<<< HEAD
});
=======
});
>>>>>>> parent of 97f1732 (signup & login front-end)
