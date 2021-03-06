<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Database\QueryException;

class MessageController extends Controller
{
    //
    
    // RF.6 Usuario tiene que poder enviar mensajes a la party

    public function createMessage(Request $request){
      $message = $request->input('message');
      $idplayer = $request->input('idplayer');
      $idparty = $request->input('idparty');
  
      try {
  
        return Message::create([
            'message' => $message,
            'idplayer' => $idplayer,
            'idparty' => $idparty
        ]);
  
    } catch (QueryException $error) {
        
        $eCode = $error->errorInfo[1];
  
        if($eCode == 1062) {
            return response()->json([
                'error' => "El mensaje no ha podido ser enviado"
            ]);
        }
  
    }
  
  }

    // RF. 6 '2' Editar mensaje

    public function modifyMessage(Request $request){

      $id = $request->input('id');
      $message = $request->input('message');


      try {
              
          return Message::where('id', '=', $id)
          ->update(['message' => $message]);

      } catch(QueryException $error) {
           return $error;
      }
  }

    // RF. 6 '3' Borrar mensaje

    public function deleteMessage(Request $request){

      $idparty = $request->input('idparty');

      try {

          return Message::destroy([
              'idparty' => $idparty,
          ]);
  
      } catch (QueryException $error) {
          
          $eCode = $error->errorInfo[1];
  
          if($eCode == 1062) {
              return response()->json([
                  'error' => "No has podido borrar este mensaje"
              ]);
          }
  
      }
  }

    // RF.7 Traer todos los mensajes.

    public function partyMessages($id){

      try{
        return Message::all()->where('idparty', '=', $id);

      }catch(QueryException $error){
        return $error;
    }
  }



  
}
  


