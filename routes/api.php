<?php

use App\Http\Controllers\Crm\ClientController;
use App\Http\Controllers\Crm\CrmClientAddressController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Mrp\MrpWorkcenterController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductStructureController;
use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\System\GroupController;
use App\Http\Controllers\System\SubGroupController;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ROTAS COM MIDDLEAWARE -- COM AUTENTICAÇÃO
Route::middleware('auth:api')->get('/address', function (Request $request) {
    return Address::where('user_id', auth()->user()->id)->first();
});

//ROTAS SEM MIDDLEAWARE -- SEM AUTENTICAÇÃO
Route::get('/items', [ItemController::class, 'index']);
Route::prefix('item')->group(function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});

//ROTA DE GRUPOS
Route::get('/groups', [GroupController::class, 'index']);
Route::prefix('group')->group(function () {
    Route::post('/store', [GroupController::class, 'store']);
});

//ROTA DE SUBGRUPOS
Route::get('/subgroups', [SubGroupController::class, 'index']);
Route::prefix('subgroup')->group(function () {
    Route::post('/store', [SubGroupController::class, 'store']);
});

//ROTA DE TIPOS DE PRODUTOS
Route::get('/types', [ProductTypeController::class, 'index']);
Route::prefix('type')->group(function () {
    Route::post('/store', [ProductTypeController::class, 'store']);
});

//ROTA CLIENTES
Route::get('/clients', [ClientController::class, 'index']);
Route::prefix('client')->group(function () {
    Route::post('/store', [ClientController::class, 'store']); 
});

//ROTA ENDEREÇO DE CLIENTES
Route::get('/client-address', [CrmClientAddressController::class, 'index']);
Route::prefix('client')->group(function () {
    Route::post('/store', [CrmClientAddressController::class, 'store']); 
});

//ROTA PRODUTOS
Route::get('/products', [ProductController::class, 'index']);
Route::prefix('product')->group(function () {
    Route::post('/store', [ProductController::class, 'store']); 
    Route::get('/{id}', [ProductController::class, 'show']);
});

//ROTA ESTRUTURA
Route::get('/structures', [ProductStructureController::class, 'index']);
Route::prefix('structure')->group(function () {
    Route::post('/store', [ProductStructureController::class, 'store']); 
});

//ROTA ESTRUTURA
Route::get('/workcenters', [MrpWorkcenterController::class, 'index']);
Route::prefix('workcenter')->group(function () {
    Route::post('/store', [MrpWorkcenterController::class, 'store']); 
});


    

