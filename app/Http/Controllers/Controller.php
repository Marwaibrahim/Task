<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendResponse($result,$_code, $message)
    {
        $status = $this->createStatus($_code,true,$message);
        if($result===null)
            $response=['status'=>$status];
        else
            $response=['status'=>$status,'data' => $result];
        return response()->json($response, 200);
    }

    public function sendError($message="",$_code)
    {
        $status = $this->createStatus($_code,false,$message);

        return response()->json(['status'=>$status], $_code);
    }

    public function createStatus($code, $success,$message){
        return $status=['code'=>$code,'success'=>$success,'message'=>$message];
    }
}
