<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Login
// Route::get('/login', function () {
//     return view('sesi/index');
// });

// //contoh pemakaian route
// Route::get('/mhs', function () {
//     return 'mhs';
// });
// // route ID
// Route::get('/mhs/{id}', function ($id) {
//     return "mhs dengan ID $id";
// })->where('id', '[0-9]=');
// // route ID Nama
// Route::get('/mhs/{id}/{nama}', function ($id, $nama) {
//     return "mhs dengan ID $id dan Nama $nama";
// })->where(['id'=>'[0-9]+', 'nama'=>'[A-za-z]+']);


//Frontend
Route::get('/', function () {
    return view('frontend/menus/dashboard');
});

//admin
// Route::get('mhs', [MahasiswaController::class, 'index']);
// Route::get('mhs/{id}', [MahasiswaController::class, 'detail_id'])->where('id', '[0-9]+');
// Route::get('mhs/{id}/{nama}', [MahasiswaController::class, 'detail_nama'])->where(['id'=>'[0-9]+', 'nama'=>'[A-za-z]+']);

// Route::get('mhs', [MahasiswaController::class, 'index']);
// Route::get('/admin', function () {
//     return view('admin/menus/dashboard');
// });
// Route::get('/admin/m', function () {
//     return view('admin/menus/mhs');
// });
// Route::get('/admin/mhs', [MahasiswaController::class, 'index']);

//diganti lebih simpel pada admin
Route::resource('mhs', MahasiswaController::class)->middleware('isLogin');


//login
Route::get('/sesi', [SessionsController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionsController::class, 'login'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionsController::class, 'logout'])->middleware('isLogin');

Route::get('/sesi/register', [SessionsController::class, 'register'])->middleware('isTamu');
Route::post('/sesi/create', [SessionsController::class, 'create'])->middleware('isTamu');
Route::get('/sesi/user', [SessionsController::class, 'show']);
