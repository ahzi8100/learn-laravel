<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('/blogs/{id}/update', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');

// Route::resource('blog', BlogController::class);

// Route::prefix('blogs')->group(function () {
//     Route::get('/', [BlogController::class, 'index'])->name('blog.index');
//     Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
//     Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
//     Route::get('/{id}/detail', [BlogController::class, 'show'])->name('blog.show');
//     Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
//     Route::patch('/{id}/update', [BlogController::class, 'update'])->name('blog.update');
//     Route::delete('/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
// });


// Route::get('url', function () {
//     return 'isi response';
// });

// Route::get('/hello', function () {
//     return 'Halo dari laravel 11';
// });

// Route::get('/artikel', function () {
//     return 'Ini adalah halaman artikel';
// });

// Route::get('/blog', function () {
//     return view('blog');
// });

// Route::get('/blog', function () {
//     return view('blog', ['data' => 'Blog 1', 'title' => 'Belajar Laravel 11']);
// });

// Route::get('/blog', function () {
//     $data = 'Blog 1';
//     $title = 'Belajar Laravel 11';
//     return view('blog', ['data' => $data, 'title' => $title]);
// });

// Route::get('/hitung', function () {
//     $a = 4;
//     $b = 6;
//     return 'Hasil: ' . ($a + $b);
// });

// Route::view('/tentang', 'about');
// Route::view('/blog', 'blog', ['data' => 'Blog 1', 'title' => 'Belajar Laravel 11']);

// Route::get('/produk/{id}', function ($id) {
//     return 'Ini halaman informasi detail produk id: ' . $id;
// });

// Route::get('/user/{nama?}', function ($nama = 'Tamu') {
//     return "Halo Selamat Datang, $nama!";
// });

// Route::get('/profile', function () {
//     return 'Ini halaman profile';
// })->name('prf');

// Route::get('/ke-profile', function () {
//     return redirect()->route('prf');
// });

// Route::redirect('/beranda', '/hitung');

// Route::get('/blog', [BlogController::class, 'index']);

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     })->name('admin.dashboard');
//     Route::get('/profile', function () {
//         return 'Ini halaman profile';
//     })->name('admin.profile');
// });

// Route::resource('/posts', PostController::class);
