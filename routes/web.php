<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class,'index'])->name("index");

Route::get("create",[TodoController::class,"create"]);

Route::get("details/{todo}",[TodoController::class,"details"])->name('details');

Route::get("edit/{todo}",[TodoController::class,"edit"])->name("edit");

Route::post("update/{todo}",[TodoController::class,"update"])->name("update");

Route::get('delete/{todo}', [TodoController::class, 'delete'])->name('delete');

Route::post("store",[TodoController::class,"store"])->name(name: "store");

Route::get('login',[TodoController::class,'login']);