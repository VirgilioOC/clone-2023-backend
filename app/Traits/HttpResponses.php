<?php

namespace App\Traits;

trait HttpResponses {
    protected function success($data, $message, $code){
        return response()->json([
            'status' => 'Request was successful.',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error($data, $message, $code){
        return response()->json([
            'status' => 'Error occurred.',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}