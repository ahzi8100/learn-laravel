<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('/blogs/{id}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
    Route::get('/blogs/trash', [BlogController::class, 'trash'])->name('blogs.trash');
    Route::get('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');

    Route::middleware('admin')->group(function () {
        Route::get('/phones', [PhoneController::class, 'index'])->name('phones.index');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');
        Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
        Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

        Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/blogs', [BlogController::class, 'homepage'])->name('blogs.homepage');
Route::get('/blogs/{id}', [BlogController::class, 'detail'])->name('blogs.detail');

Route::get('/upload', function () {
    return Storage::disk('public')->put('example2.txt', 'ini konten example.txt');
});

Route::get('/file-uploaded', function () {
    return asset('storage/example2.txt');
});


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
