<?php

use App\Http\Controllers\MotorsController;
use App\Models\Motors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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


Route::match(['get', 'post'], '/', [MotorsController::class,'index'])->name('index');
//Route::get('/', [MotorsController::class,'index'])->name('index');
Route::get('/dashboard', function () {
    return view('dashboard',[
        'motors' => Motors::where('user_id',Auth::id())->orderBy('id','desc')
        ->paginate(20)
    ]);
})->middleware(['auth'])->name('dashboard');


Route::resource('/ware', MotorsController::class)->except('index');



require __DIR__.'/auth.php';
