<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\BlogPageController;
use App\Models\BlogPost;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
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

    Route::get('/', [HomeController::class, 'index']);

Route::get('/catalog', [CatalogController::class, 'index']);
    Route::get('/catalog/{id}', [CatalogController::class, 'show']);

    Route::get('/blog', [BlogPageController::class, 'index']);
    Route::get('/blog/{id}', [BlogPageController::class, 'show']);

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
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

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
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders');

        Route::get('/pages', [PageController::class, 'index'])->name('pages');
        Route::put('/pages', [PageController::class, 'update'])->name('pages.update');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
