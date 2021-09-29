  <?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\DashboardController;

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

//homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

//dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum','admin'])
    ->group(function() {
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('data', DataController::class);
        Route::resource('proses',ProsesController::Class);
        Route::resource('hasils',HasilController::Class);

        Route::get('/barang',[\App\Http\Controllers\BarangController::class, 'index']);
        Route::get('/barang/create',[\App\Http\Controllers\BarangController::class, 'create']);
        Route::get('/barang/edit/{id}',[\App\Http\Controllers\BarangController::class, 'edit']);
        Route::post('/barang/store',[\App\Http\Controllers\BarangController::class, 'store']);
        Route::post('/barang/patch',[\App\Http\Controllers\BarangController::class, 'patch']);
        Route::delete('/barang/destroy/{id}',[\App\Http\Controllers\BarangController::class, 'destroy']);

        Route::get('/transaksi',[\App\Http\Controllers\TransaksiController::class, 'index']);
        Route::get('/transaksi/create',[\App\Http\Controllers\TransaksiController::class, 'create']);
        Route::get('/transaksi/detail/{id}',[\App\Http\Controllers\TransaksiController::class, 'detail']);
        Route::post('/transaksi/store',[\App\Http\Controllers\TransaksiController::class, 'store']);

        Route::post('/transaksi/patch',[\App\Http\Controllers\TransaksiController::class, 'patch']);
        Route::delete('/transaksi/destroy/{id}',[\App\Http\Controllers\TransaksiController::class, 'destroy']);

        Route::post('/transaksi/cart/store',[\App\Http\Controllers\TransaksiController::class, 'addCart']);
        Route::post('/transaksi/cart/destroy/{id}',[\App\Http\Controllers\TransaksiController::class, 'deleteCart']);
        Route::get('/transaksi/cart',[\App\Http\Controllers\TransaksiController::class, 'getCartNoTransaction']);

        Route::get('/perhitungan',[\App\Http\Controllers\PerhitunganController::class, 'page']);
    });

Route::get('/hitung', [\App\Http\Controllers\PerhitunganController::class, 'index']);
Route::get('/mapping', [\App\Http\Controllers\PerhitunganController::class, 'mapping']);
Route::get('/mapping2', [\App\Http\Controllers\PerhitunganController::class, 'mapping2']);
Route::get('/all-item', [\App\Http\Controllers\PerhitunganController::class, 'allItem']);
Route::get('/test-to-map', [\App\Http\Controllers\PerhitunganController::class, 'testToMap']);
Route::get('midtrans/success', [MidtransController::class,'success']);
Route::get('midtrans/unfinish', [MidtransController::class,'unfinish']);
Route::get('midtrans/error', [MidtransController::class,'error']);
