<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Redirect root to default language
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/az');
});

/*
|--------------------------------------------------------------------------
| Localized routes
|--------------------------------------------------------------------------
*/
Route::prefix('{lang}')->where(['lang' => 'az|ru|en'])->group(function () {

    Route::get('/', function ($lang) {
        return view('pages.home', compact('lang'));
    });

    Route::get('/catalog', function ($lang) {
        return view('pages.catalog', compact('lang'));
    });

    Route::get('/catalog/{id}', function ($lang, $id) {
        return view('pages.product', compact('lang', 'id'));
    });

    Route::get('/blog', function ($lang) {
        return view('pages.blog', compact('lang'));
    });

    Route::get('/blog/{id}', function ($lang, $id) {
        return view('pages.blog_item', compact('lang', 'id'));
    });

    Route::get('/doctor-info', function ($lang) {
        return view('pages.doctor', compact('lang'));
    });

    Route::get('/rules', function ($lang) {
        return view('pages.rules', compact('lang'));
    });

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return view('admin.index');
});