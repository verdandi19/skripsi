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
    });

Route::get('/hitung', [\App\Http\Controllers\PerhitunganController::class, 'index']);
Route::get('/mapping', [\App\Http\Controllers\PerhitunganController::class, 'mapping']);
Route::get('/mapping2', [\App\Http\Controllers\PerhitunganController::class, 'mapping2']);
Route::get('/all-item', [\App\Http\Controllers\PerhitunganController::class, 'allItem']);
Route::get('/test-to-map', [\App\Http\Controllers\PerhitunganController::class, 'testToMap']);
Route::get('midtrans/success', [MidtransController::class,'success']);
Route::get('midtrans/unfinish', [MidtransController::class,'unfinish']);
Route::get('midtrans/error', [MidtransController::class,'error']);
