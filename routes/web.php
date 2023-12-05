<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardAlatLabController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LayananController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegisterController;
use App\Models\Pengumuman;

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

// Route::get('/', function () {
//     return view('home', ["title" => "Home", 'active' => 'home']);
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/get', [HomeController::class, 'getTiket']);
Route::get('/katalog', [HomeController::class, 'katalog']);
Route::post('/katalog/checkout', [HomeController::class, 'checkout']);
Route::get('/katalog/checkout', [HomeController::class, 'checkout']);
Route::get('/katalog/isiform', [HomeController::class, 'isiform']);
Route::post('/katalog/verifdatadiri', [HomeController::class, 'verifdatadiri']);
Route::get('/kontakkami', [HomeController::class, 'kontakkami']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/pengumuman', [PengumumanController::class, 'index']);
Route::get('/pengumuman/detail/{id}', [PengumumanController::class, 'detail']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/fasilitas', [HomeController::class, 'fasilitas']);
Route::get('/fasilitas/detail/{id}', [HomeController::class, 'detailfasilitas']);
Route::get('/download', [HomeController::class, 'download']);
Route::get('/layanan/pendidikan', [HomeController::class, 'pendidikan']);
Route::get('/layanan/penelitian', [HomeController::class, 'penelitian']);
Route::get('/layanan/pengujian', [HomeController::class, 'pengujian']);





// Route::get('/layanan/pendidikan', function () {
//     return view('pendidikan',['active' => 'Layanan']);
// });

// Route::get('/layanan/penelitian', function () {
//     return view('penelitian', ['active' => 'Layanan']);
// });

// Route::get('/layanan/pengujian', function () {
//     return view('pengujian', ['active' => 'Layanan']);
// });

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/category/edit/{id}', [AdminCategoryController::class, 'editkategoriberita'])->middleware('admin');
Route::put('/dashboard/category/update', [AdminCategoryController::class, 'updatekategoriberita'])->middleware('admin');


Route::delete('/dashboard/kategoriberita/hapus/{id}', [AdminCategoryController::class, 'hapus'])->middleware('admin');


Route::get('/dashboard/alat', [DashboardAlatLabController::class, 'index'])->middleware('auth');
Route::get('/dashboard/alat/create', [DashboardAlatLabController::class, 'create'])->middleware('auth');
Route::post('/dashboard/alat/tambahdata', [DashboardAlatLabController::class, 'tambahdata'])->middleware('auth');
Route::get('/dashboard/alat/view/{id}', [DashboardAlatLabController::class, 'lihatalat'])->middleware('auth');
Route::get('/dashboard/alat/edit/{id}', [DashboardAlatLabController::class, 'editalat'])->middleware('auth');
Route::put('/dashboard/alat/ubahalat', [DashboardAlatLabController::class, 'ubahalat'])->middleware('auth');
Route::delete('/dashboard/alat/hapus/{id}', [DashboardAlatLabController::class, 'hapusalat'])->middleware('auth');

Route::get('/dashboard/kategori', [DashboardAlatLabController::class, 'kategori'])->middleware('auth');
Route::get('/dashboard/kategori/create', [DashboardAlatLabController::class, 'tambahkategori'])->middleware('auth');
Route::post('/dashboard/kategori/tambahdata', [DashboardAlatLabController::class, 'tambahdatakategori'])->middleware('auth');
Route::get('/dashboard/kategori/edit/{id}', [DashboardAlatLabController::class, 'editkategori'])->middleware('auth');
Route::put('/dashboard/kategori/ubahkategori', [DashboardAlatLabController::class, 'ubahkategori'])->middleware('auth');
Route::delete('/dashboard/kategori/hapus/{id}', [DashboardAlatLabController::class, 'hapuskategori'])->middleware('auth');

Route::get('/dashboard/faq', [FaqController::class, 'index'])->middleware('auth');
Route::get('/dashboard/faq/create', [FaqController::class, 'create'])->middleware('auth');
Route::post('/dashboard/faq/tambahdata', [FaqController::class, 'tambahdatakategori'])->middleware('auth');
Route::get('/dashboard/faq/edit/{id}', [FaqController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/faq/ubahfaq', [FaqController::class, 'ubahfaq'])->middleware('auth');
Route::delete('/dashboard/faq/hapus/{id}', [FaqController::class, 'hapus'])->middleware('auth');


Route::get('/dashboard/pengumuman', [PengumumanController::class, 'pengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/create', [PengumumanController::class, 'create'])->middleware('auth');
Route::post('/dashboard/pengumuman/tambahdata', [PengumumanController::class, 'tambahdata'])->middleware('auth');
Route::get('/dashboard/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/pengumuman/ubahpengumuman', [PengumumanController::class, 'ubahpengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/ubahpengumuman', [PengumumanController::class, 'ubahpengumuman'])->middleware('auth');
Route::delete('/dashboard/pengumuman/hapus/{id}', [PengumumanController::class, 'hapus'])->middleware('auth');

Route::get('/dashboard/galeri', [GaleriController::class, 'index'])->middleware('auth');
Route::get('/dashboard/galeri/create', [GaleriController::class, 'create'])->middleware('auth');
Route::post('/dashboard/galeri/tambahdata', [GaleriController::class, 'tambahdata'])->middleware('auth');
Route::get('/dashboard/galeri/edit/{id}', [GaleriController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/galeri/ubahgaleri', [GaleriController::class, 'ubahgaleri'])->middleware('auth');
Route::delete('/dashboard/galeri/hapus/{id}', [GaleriController::class, 'hapus'])->middleware('auth');

Route::get('/dashboard/fasilitas', [FasilitasController::class, 'index'])->middleware('auth');
Route::get('/dashboard/fasilitas/create', [FasilitasController::class, 'create'])->middleware('auth');
Route::post('/dashboard/fasilitas/tambahdata', [FasilitasController::class, 'tambahdata'])->middleware('auth');
Route::get('/dashboard/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/fasilitas/ubahfasilitas', [FasilitasController::class, 'ubahfasilitas'])->middleware('auth');
Route::delete('/dashboard/fasilitas/hapus/{id}', [FasilitasController::class, 'hapus'])->middleware('auth');

Route::get('/dashboard/download', [DownloadController::class, 'index'])->middleware('auth');
Route::get('/dashboard/download/create', [DownloadController::class, 'create'])->middleware('auth');
Route::post('/dashboard/download/tambahdata', [DownloadController::class, 'tambahdata'])->middleware('auth');
Route::get('/dashboard/download/edit/{id}', [DownloadController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/download/ubahdownload', [DownloadController::class, 'ubahdownload'])->middleware('auth');
Route::delete('/dashboard/download/hapus/{id}', [DownloadController::class, 'hapus'])->middleware('auth');

Route::get('/dashboard/datapeminjam/{id}', [DataPeminjamController::class, 'index'])->middleware('admin');
Route::get('/dashboard/datapeminjam/create/{id}', [DataPeminjamController::class, 'create'])->middleware('admin');
Route::post('/dashboard/datapeminjam/tambahdata', [DataPeminjamController::class, 'tambahdata'])->middleware('admin');
Route::get('/dashboard/datapeminjam/edit/{id}', [DataPeminjamController::class, 'edit'])->middleware('admin');
Route::put('/dashboard/datapeminjam/store', [DataPeminjamController::class, 'store'])->middleware('admin');
Route::delete('/dashboard/datapeminjam/hapus/{id}/{alat}', [DataPeminjamController::class, 'hapus'])->middleware('admin');

Route::get('/dashboard/layanan', [LayananController::class, 'index'])->middleware('admin');
Route::get('/dashboard/layanan/edit/{id}', [LayananController::class, 'editlayanan'])->middleware('admin');
Route::put('/dashboard/layanan/ubahlayanan', [LayananController::class, 'ubahlayanan'])->middleware('admin');





Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])
    ->name('cart.addToCart');










