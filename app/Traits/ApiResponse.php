<?php

namespace App\Traits;

trait ApiResponse
{
    public function sucesso($data, $code, $message)
    {
        return response()->json([
            'sucesso' => true,
            'messagem' => $message,
            'data' => $data
        ], $code);
    }

    public function error($data, $code , $message)
    {
        return response()->json([
            'sucesso' => false,
            'messagem' => $message,
            'data' => $data
        ], $code);
    }

    public function notFound($code, $message)
    {
        return response()->json([
            'sucesso' => false,
            'messagem' => $message,
            'data' => []
        ], $code);
    }
}
