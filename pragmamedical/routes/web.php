<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Models\BlogPost;

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
        $posts = BlogPost::latest()->get();

        return view('pages.blog', compact('lang', 'posts'));
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
    return redirect()->route('admin.login');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/blog', [BlogController::class, 'index'])->name('blog');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');
        Route::get('/pages', [PageController::class, 'index'])->name('pages');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
