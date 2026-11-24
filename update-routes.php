<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () { return view("welcome"); });

Route::resource("products", ProductController::class);
Route::resource("stocks", StockController::class);
Route::resource("transactions", TransactionController::class);
