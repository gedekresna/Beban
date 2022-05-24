<?php

namespace App\Helepers;

class ClientResponse{

    public function successResponse($status,$message,$data = null){
        return response()->json()([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ],$status);
    }

    public function errorResponse($status,$message){
        return response()->json()([
            'status' => $status,
            'message' => $message,
        ],$status);
    }

}
?>