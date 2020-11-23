<?php
//* deneme
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CustomerController;

Route::get('/', [MainController::class, 'index'])->name('home');

/*
 * Lang
 */
Route::get('/lang/{lang}', [MainController::class, 'lang'])->name('lang');

/*
 * giriş - kayıt
 */
Route::get('/giris', [LoginController::class, 'login'])->name('giris');
Route::post('/giris', [LoginController::class, 'login_post']);

Route::get('/cikis', [LoginController::class, 'logout'])->name('cikis');




Auth::routes();

Route::prefix('panel')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('panel')->middleware('auth');
    /*
     * Dil İşlemleri
     */
    Route::get('/diller', [LanguageController::class, 'diller'])->name('diller')->middleware('auth');
    Route::post('/diller', [LanguageController::class, 'diller_post'])->name('diller_post')->middleware('auth');

    /*
     * Site Üye İşlemleri
     */
     Route::get('/uye-islemleri', [CustomerController::class, 'index'])->name('uyeler')->middleware('auth');
     Route::get('/profil-duzenle', [CustomerController::class, 'profil_duzenle'])->name('uyeler')->middleware('auth');
     Route::get('/sifre-guncelle', [CustomerController::class, 'sifre_guncelle'])->name('uyeler')->middleware('auth');

    /*
     * Blog işlemleri
     */
    Route::get('blog/{locale}', 'HomeController@blog')->name('blog')->middleware('auth'); //blog anasayfa
    Route::get('blog-kategoriler', 'HomeController@blog_kategoriler')->name('blog-kategoriler')->middleware('auth'); //blog kategoriler
    Route::post('blog/blog-kategori-ekle', 'HomeController@blog_kategori_ekle')->middleware('auth');
    Route::post('blog/blog-haber-ekle', 'HomeController@blog_haber_ekle')->middleware('auth');

    /*
     * Çalışmalarımız
     */
    Route::get('calismalarimiz/{locale}', 'HomeController@calismalarimiz')->name('calismalarimiz')->middleware('auth'); //çalışmalarımız anasayfa
    Route::get('calismalar-kategoriler', 'HomeController@calismalar_kategoriler')->name('calismalar-kategoriler')->middleware('auth'); //çalışmalar kategoriler
    Route::post('calismalarimiz/calismalar-kategori-ekle', 'HomeController@calismalar_kategori_ekle')->middleware('auth');
    Route::post('calismalarimiz/calisma-ekle', 'HomeController@calisma_ekle')->middleware('auth');

});
