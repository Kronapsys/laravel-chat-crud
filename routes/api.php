<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MembershipController;

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

// postman -> http://127.0.0.1:8000/api/nombreEndPoint

Route::group(['middleware'=> 'cors'], function () {

    // RF.1 Register
    Route::post('/register', [PlayerController::class, 'registerPlayer']);

    // RF.2 LogIn
    Route::post('/login', [PlayerController::class, 'loginPlayer']);

    // RF:3 Crear Party por un determinado juego
    Route::post('/createParty', [PartyController::class, 'createParty']);

    // RF.4 Buscar party
    Route::get('/searchParty/{gameName}', [PartyController::class, 'searchPartyGameName']);

    // RF.5 Entrar party
    Route::post('/joinParty', [MembershipController::class, 'joinParty']);

    // RF.5.2 Salir party
    Route::delete('/leaveParty', [MembershipController::class, 'leaveParty']);

    // RF.6 Mensajes party
    Route::post('/createMessage', [MessageController::class, 'createMessage']);

    // RF.6 Modificar mensaje
    Route::post('/modifyMessage', [MessageController::class, 'modifyMessage']);

    // RF.6 Borrar mensaje
    Route::delete('/deleteMessage', [MessageController::class, 'deleteMessage']);

    // RF.7 Traer mensajes party
    Route::get('/allMessages/{id}', [MessageController::class, 'partyMessages']);

    // RF.8 Modificar datos perfil
    Route::post('/modify', [PlayerController::class, 'modifyUsername']);

    // RF.9 LogOut
    Route::post('/logout', [PlayerController::class, 'logOut']);

    // Crear Party por un determinado juego
    Route::post('/createParty', [PartyController::class, 'createParty']);

    // Crear Game
    Route::post('/createGame', [GameController::class, 'createGame']);

});