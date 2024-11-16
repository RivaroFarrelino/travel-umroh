<?php

use App\Http\Controllers\JamaahController;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/jamaahs');
});

Route::get('/jamaahs', [JamaahController::class, 'index'])->name('jamaahs.index');
Route::get('/jamaahs-create', function (){
    return view('jamaah.create');
})->name('jamaahs.create');
Route::post('/jamaahs/store', [JamaahController::class, 'store'])->name('jamaahs.store');
