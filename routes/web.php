<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\ChapterVideo;
use App\Models\Note;

// Route::get('/', function() { return view('pages.dummy'); });


// Route::get('/', function () { return view('pages.web.home'); })->name('home');
// Route::get('/search/{query}', function () { return view('pages.web.search-note'); });
// Route::get('/login', function () { return view('pages.web.login'); });
// Route::get('/signup', function () { return view('pages.web.signup'); });
// Route::get('/change-password', function () { return view('pages.web.change-password'); });
// Route::get('/forgot-password', function () { return view('pages.web.forgot-password'); });
// Route::get('/contact-us', function () { return view('pages.web.contact-us'); });
// Route::get('/dashboard', function () { return view('pages.web.dashboard'); });
// Route::get('/forum', function() { return view('pages.web.forum'); })->name('forum');

// Route::get('/blog', function () { return view('pages.web.blog', ['posts'=>Blog::paginate(10)]); });
// Route::get('/blog/category/{id}', function () { return view('pages.web.single-blog'); });
// Route::get('/blog/{categoryName}', function () { return view('pages.web.category-blog'); });

// Route::get('/note/category/{chapterName}', function () { return view('pages.web.chapter'); });
// Route::get('/note/category/chapter/{subChapter}', function () { return view('pages.web.sub-chapter'); });
// Route::get('/note/{categoryName}', function () { return view('pages.web.category-note'); });

// Route::get('/video/category/{id}', function () { return view('pages.web.chapter-video'); });
// Route::get('/video', function () { return view('pages.web.video', ['posts'=>ChapterVideo::paginate(10)]); });

// Route::get('/note', function () { return view('pages.web.note', ['notes'=>Note::paginate(20)]); });
// Route::get('/quiz/category/{chapter}', function () { return view('pages.web.quiz'); });
// Route::get('/quiz/category/chapter/{subchapter}', function () { return view('pages.web.sub-quiz'); });


Route::get('/', function () { return view('pages.web.home'); })->name('home');
Route::get('/search/{query}', function () { return view('pages.web.search-note'); });
Route::get('/login', function () { return view('pages.web.login'); })->name('studentlogin');
Route::get('/signup', function () { return view('pages.web.signup'); });
Route::get('/change-password', function () { return view('pages.web.change-password'); });
Route::get('/forgot-password', function () { return view('pages.web.forgot-password'); });
Route::get('/contact-us', function () { return view('pages.web.contact-us'); });
Route::get('/dashboard', function () { return view('pages.web.dashboard'); })->name('studentdashboard');
Route::get('/forum', function() { return view('pages.web.forum'); })->name('forum');

Route::group(['prefix' => 'blog'], function() {
    Route::get('/', function () { return view('pages.web.blog', ['posts'=>Blog::paginate(10)]); });
    Route::get('/category/{blogid}', function () { return view('pages.web.single-blog'); });
    Route::get('/{categoryname}', function () { return view('pages.web.category-blog'); });
});

Route::group(['prefix' => 'note'], function() {
    Route::get('/', function () { return view('pages.web.note', ['notes'=>Note::paginate(20)]); });
    Route::get('/{categoryname}', function () { return view('pages.web.category-note'); });
    Route::group(['prefix' => 'category'], function() {
        Route::get('/{chapterName}', function () { return view('pages.web.chapter'); });
        Route::get('/chapter/{subChapter}', function () { return view('pages.web.sub-chapter'); });
    });
});

Route::group(['prefix' => 'quiz/category'], function() {
    Route::get('/{chapter}', function () { return view('pages.web.quiz'); });
    Route::get('/chapter/{subchapter}', function () { return view('pages.web.sub-quiz'); });
});

Route::group(['prefix' => 'video'], function() {
    Route::get('/', function () { return view('pages.web.video', ['posts'=>ChapterVideo::paginate(10)]); });
    Route::get('/category/{id}', function () { return view('pages.web.chapter-video'); });
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', function () { return view('pages.admin.login'); })->name('adminlogin');
    Route::get('/signup', function () { return view('pages.admin.signup'); });
    Route::get('/forgot-password', function () { return view('pages.admin.forgot-password'); });
    Route::get('/dashboard', function () { return view('pages.admin.dashboard'); })->name('dashboard');
    Route::get('/forgot-password', function () { return view('pages.admin.forgot-password'); });
    Route::get('/change-password', function () { return view('pages.admin.change-password'); });

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/{page}', function () { return view('pages.admin.page'); });
        Route::get('/{page}/{pageid}', function () { return view('pages.admin.edit'); });
    });
});

// Route::get('/admin/login', function () { return view('pages.admin.login'); });
// Route::get('/admin/signup', function () { return view('pages.admin.signup'); });
// Route::get('/admin/forgot-password', function () { return view('pages.admin.forgot-password'); });
// Route::get('/admin/dashboard', function () { return view('pages.admin.dashboard'); });
// Route::get('/admin/forgot-password', function () { return view('pages.admin.forgot-password'); });
// Route::get('/admin/change-password', function () { return view('pages.admin.change-password'); });
// Route::get('/admin/dashboard/quiz', function () { return view('pages.admin.quiz'); });
// Route::get('/admin/dashboard/blog', function () { return view('pages.admin.blog'); });
// Route::get('/admin/dashboard/notes', function () { return view('pages.admin.notes'); });


// Route::get('/admin/dashboard/blog/edit/{id}', function () { return view('pages.admin.edit-blog'); });
// Route::get('/admin/dashboard/mcq/edit/{id}', function () { return view('pages.admin.edit-mcq'); });
// Route::get('/admin/dashboard/note/edit/{id}', function () { return view('pages.admin.edit-note'); });
