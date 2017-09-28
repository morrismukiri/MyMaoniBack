<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use ClassPreloader\Config;
use Illuminate\Http\Request;
use App\Classes\AfricasTalkingGateway;

class SMSController extends AppBaseController
{

    function sendSMS(Request $request)
    {
        $to = $request['to'];
        $message = $request['message'];
        $result = $this->send($to, $message);
        if($result){
            return response()->json(compact('result'));
        }
    }

    function send($to, $message)
    {
        $username =config('services.AfricasTalking.USERNAME');
        $apikey = config('services.AfricasTalking.API_KEY');
        $gateway = new AfricasTalkingGateway($username, $apikey);
        $status = "";
        try {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($to, $message);

            foreach ($results as $result) {
                // status is either "Success" or "error message"
                $status .= " Number: " . $result->number;
                $status .= " Status: " . $result->status;
                $status .= " MessageId: " . $result->messageId;
                $status .= " Cost: " . $result->cost . "\n";
            }
        } catch (AfricasTalkingGatewayException $e) {
            return false;
            echo "Encountered an error while sending: " . $e->getMessage();

        }
        return $status;
    }
}
