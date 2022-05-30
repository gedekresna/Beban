<?php

namespace App\Helpers;

class ClientResponse{

    public static function successResponse($status,$message,$data = null){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ],$status);
    }

    public static function errorResponse($status,$message){
        return response()->json([
            'status' => $status,
            'message' => $message,
        ],$status);
    }

    public static function errorValidatonResponse($status, $validation){
        return response()->json([
            'status' => $status,
            'message' => "Error on Validation",
            'validation' => $validation
        ],$status);
    }
}
?>
