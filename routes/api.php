<?php

use App\Http\Controllers\BillingoController;
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

Route::group(['prefix' => 'billingo/v3'], function () {
    Route::group(['prefix' => 'documents'], function () {
        Route::post('/', [BillingoController::class, 'createDocument'])->name('billingo.documents.create');
        Route::get('/', [BillingoController::class, 'getDocumentList'])->name('billingo.documents.list');
        Route::get('/{id}', [BillingoController::class, 'getOneDocument'])->name('billingo.documents.one');
        Route::get('/{id}/download', [BillingoController::class, 'downloadDocument'])->name('billingo.documents.one');
    });

    Route::group(["prefix" => "partners"], function (){
        Route::get("/", [BillingoController::class, 'partners']);
    });
});
