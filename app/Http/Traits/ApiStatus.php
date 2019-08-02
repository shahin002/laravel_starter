<?php
namespace App\Http\Traits;


trait ApiStatus
{
    protected $successStatus = 200;
    protected $failureStatus = 100;

    public function successResponse($response)
    {
        return response()->json(['meta' => array('status' => $this->successStatus), 'response' => $response]);

    }

    public function failureResponse($response)
    {
        return response()->json(['meta' => array('status' => $this->failureStatus), 'response' => $response]);

    }

}