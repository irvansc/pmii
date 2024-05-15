<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\back\FileController;
use App\Http\Controllers\back\FotoController;
use App\Http\Controllers\back\PostController;
use App\Http\Controllers\back\RoleController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\Back\AlumniController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\UserListController;
use App\Http\Controllers\front\ArticleController;
use App\Http\Controllers\front\SitemapController;
use App\Http\Controllers\back\PermissionController;
use App\Http\Controllers\front\FiledownloadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.pages.home');
});

Auth::routes();

Route::get('/verify/{token}', [AlumniController::class, 'verifyUser'])->name('verify');
Route::middleware(['auth','verifyuser'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::post('/change-profile-picture', [UserController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
    Route::prefix('konfigurasi')->name('konfigurasi.')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users-list', UserListController::class);

    });
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::middleware('can:read post')->group(function () {
            Route::view('/categories', 'back.admin.pages.categories')->name('categories');
            Route::view('/add-post', 'back.admin.pages.add-post')->name('add-post');
            Route::post('/create', [PostController::class, 'createPost'])->name('create');
            Route::view('/all-post', 'back.admin.pages.all_posts')->name('all_posts');
            Route::get('/edit-posts', [PostController::class, 'editPost'])->name('edit-posts');
            Route::post('/update-post', [PostController::class, 'updatePost'])->name('update-post');
            Route::post('/post-upload', [PostController::class, 'contentImage'])->name('post-upload');
        });
    });

    Route::middleware('can:read setting')->group(function () {
        Route::view('/settings', 'back.admin.pages.settings')->name('settings');
        Route::post('/change-web-logo', [AdminController::class, 'changeWebLogo'])->name('change-web-logo');
        Route::post('/change-email-logo', [AdminController::class, 'changeEmailLogo'])->name('change-email-logo');
        Route::post('/change-web-favicon', [AdminController::class, 'changeWebFavicon'])->name('change-web-favicon');
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::view('/home', 'back.admin.pages.setting.home')->name('home');
            Route::view('/about', 'back.admin.pages.setting.about')->name('about');
            Route::view('/vm', 'back.admin.pages.setting.visiMisi')->name('vm');
            Route::view('/galery', 'back.admin.pages.setting.galery')->name('galery');
            Route::get('add-foto', [FotoController::class, 'index'])->name('add-foto');
            Route::post('store-foto', [FotoController::class, 'StoreFoto'])->name('store-foto');
            Route::get('/edit/foto/{id}', [FotoController::class, 'editFoto'])->name('edit-foto');
            Route::view('/folder', 'back.admin.pages.setting.folder')->name('folder');
            // Folder
            Route::get('add-folder', [FileController::class, 'addFolder'])->name('add-folder');
            Route::post('store-folder', [FileController::class, 'storeFolder'])->name('store-folder');
            Route::get('folders/{filename}/download', [FileController::class, 'download'])->name('folders.download');
            Route::get('/edit-folder', [FileController::class, 'editFolder'])->name('edit-folder');
            Route::post('/update-folder', [FileController::class, 'updateFolder'])->name('update-folder');
             // INBOX
            });
            Route::view('inbox', 'back.admin.pages.setting.inbox')->name('inbox');
        Route::view('/jabatan-list', 'back.admin.pages.setting.jabatan-list')->name('jabatan-list');
        Route::view('/struktur-organisasi', 'back.admin.pages.setting.struktur-organisasi')->name('struktur');
    });
});
Route::view('/article', 'front.pages.article.home')->name('article');
Route::view('/galery', 'front.pages.galery')->name('galery');

Route::view('/file', 'front.pages.file')->name('file');
Route::view('/contact', 'front.pages.contact')->name('contact');
Route::get('/article/{any}',[ArticleController::class,'readPost'])->name('read_post');
Route::get('/category/{any}',[ArticleController::class,'categoryPost'])->name('category_post');
Route::get('/tag/{any}',[ArticleController::class,'tagPost'])->name('tag_post');
Route::get('/search',[ArticleController::class,'searchBlog'])->name('search_post');
Route::get('folders/{filename}/download', [FiledownloadController::class, 'download'])->name('folders.downloads');

Route::prefix('team')->name('team.')->group(function () {
    Route::view('/team', 'front.pages.team')->name('team');
    Route::view('/anggota', 'front.pages.anggota')->name('anggota');
    Route::view('/alumni', 'front.pages.alumni')->name('alumni');
    Route::view('/pendaftaran/anggota', 'front.pages.pendaftaran.anggota')->name('pendaftaran.anggota');
    Route::view('/pendaftaran/alumni', 'front.pages.pendaftaran.alumni')->name('pendaftaran.alumni');
});
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');


