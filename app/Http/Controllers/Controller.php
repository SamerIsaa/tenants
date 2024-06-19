<?php

namespace App\Http\Controllers;

abstract class Controller
{

    function response_api($status, $message, $statusCode, $items = null)
    {
        $response = ['status' => $status, 'message' => $message];
        if ($status && isset($items)) {
            $response['item'] = $items;
        } else {
            $response['errors_object'] = $items;
        }
        return response()->json($response, $statusCode);
    }

}
