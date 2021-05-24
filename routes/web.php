<?php

use App\Http\Livewire\Backend\Pages\Categorycreate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', \App\Http\Livewire\Backend\Pages\Admindashboard::class)->name('dashboard');

// Backend Category routes start
Route::get('/admin/categories', \App\Http\Livewire\Backend\Pages\Categoryindex::class)->name('admin.category.index');
Route::get('/admin/category/add', \App\Http\Livewire\Backend\Pages\Categorycreate::class)->name('admin.category.create');
Route::get('/admin/category/{id}', \App\Http\Livewire\Backend\Pages\Categoryedit::class)->name('admin.category.edit');
// Backend Category routes ends

// Backend tag routes start
Route::get('/admin/tags', \App\Http\Livewire\Backend\Pages\Tagindex::class)->name('admin.tag.index');
Route::get('/admin/tags/add', \App\Http\Livewire\Backend\Pages\Tagcreate::class)->name('admin.tag.create');
Route::get('/admin/tags/{slug}', \App\Http\Livewire\Backend\Pages\Tagedit::class)->name('admin.tag.edit');
// Backend tag routes ends

// Backend Category routes start
Route::get('/admin/posts', \App\Http\Livewire\Backend\Pages\Postindex::class)->name('admin.post.index');
Route::get('/admin/post/create', \App\Http\Livewire\Backend\Pages\Postcreate::class)->name('admin.post.create');
Route::get('/admin/post/{id}', \App\Http\Livewire\Backend\Pages\Postedit::class)->name('admin.post.edit');

