<?php

namespace App\Events;

use Illuminate\Http\Request;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogRequestEvent
{
    use Dispatchable, SerializesModels;

    public $ip;
    public $requestType;
    public $requestData;
    public $response;

    public function __construct($ip, $requestType, $requestData, $response)
    {
        $this->ip = $ip;
        $this->requestType = $requestType;
        $this->requestData = $requestData;
        $this->response = $response;
    }
}
