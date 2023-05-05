<?php

use App\Http\Controllers\listController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/lista',[listController::class, 'listagem']);
Route::get('/lista/{id}', [listController::class, 'getById']);

Route::post('/tarefas/',[listController::class, 'adicionar']);
Route::put('/editar/{id}',[listController::class, 'editar']);
Route::put('/update/{id}/{finalizar}', [listController::class, 'update']);


Route::delete('/delete/{id}',[listController::class, 'delete']);
