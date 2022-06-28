<?php

namespace App\Data;

use App\Contact;

use App\Call;
use App\Interfaces\CarrierInterface;
use Exception;
use Twilio\Rest\Client;


class CarrierInterfaceImpl implements CarrierInterface
{

    public $tw_account_id = "AC42ab2342bca9f99a1cede0aeb25fdafa";
    public $tw_auth_token = "411080089c233610f211197ea4d7bc76";
    public $tw_phone_number = "+17167079756";

    public $phone_number = "";

    public function sendSms($phone_number, $body)
    {
        $client = new Client($this->tw_account_id, $this->tw_auth_token);
        $message = $client->messages->create(
            $phone_number,
            array(
                'from' => $this->tw_phone_number,
                'body' => $body
            )
        );

        return $message;
    }

    public function dialContact(Contact $contact)
    {
        $this->phone_number = $contact->phone_number;
    }

    public function makeCall(): Call
    {

        $client = new Client($this->tw_account_id, $this->tw_auth_token);

        $call = $client->calls->create(
            $this->phone_number,
            $this->tw_phone_number,
            array("url" =>  "http://demo.twilio.com/docs/voice.xml")
        );

        return new Call($call);
    }
}
