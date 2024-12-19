<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReaderController;

Route::get('/', function () {
    return view('index');
});

Route::resources([
    'books' => BookController::class,
    'readers' => ReaderController::class,
    'borrows' => BorrowController::class,
]);