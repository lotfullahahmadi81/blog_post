<?php

use App\Http\Controllers\backend\AboutController as BackendController;
use App\Http\Controllers\AboutController as FrontendController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController as BackendSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');

Route::get('/about', [FrontendController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    if (!in_array($locale, ['en', 'fa'])) {
        abort(404);
    }
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale.switch');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin/about', [BackendController::class, 'index'])->name('about.index');
    Route::post('admin/about', [BackendController::class, 'store'])->name('about.store');
    Route::get('admin/setting', [BackendSettingController::class, 'index'])->name('setting.index');
    Route::post('admin/setting', [BackendSettingController::class, 'update'])->name('setting.update');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__ . '/auth.php';
