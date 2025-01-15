<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductsController::class, 'index']);


Route::get('/dynamic-form', [DynamicFormController::class, 'create']);
Route::post('/dynamic-form', [DynamicFormController::class, 'store']);
