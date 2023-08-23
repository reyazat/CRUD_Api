<?php

namespace App\Http\Helpers;

class Helpers
{
   
    public static function setResponse($params = [])
    {

        $msg['status'] = (isset($params['status'])) ? $params['status'] : '';
        $msg['code'] = (isset($params['code'])) ? $params['code'] : 400;
        $msg['message'] = (isset($params['message'])) ? $params['message'] : '';
        $msg['errors'] = (isset($params['errors'])) ? $params['errors'] : new class{};

        $msg['data'] = (isset($params['data'])) ? $params['data'] : new class{};

        return response()->json($msg , $msg['code']);
    }
}