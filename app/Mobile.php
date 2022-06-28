<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;

class Mobile
{

	protected $provider;

	function __construct(CarrierInterface $provider)
	{
		$this->provider = $provider;
	}


	public function makeCallByName($name = '')
	{
		if (empty($name)) return;

		$contact = ContactService::findByName($name);

		if (empty($contact->name)) return;

		$this->provider->dialContact($contact);

		return $this->provider->makeCall();
	}

	public function sendMessagebyName($phone_number = '', $body = '')
	{
		if (empty($phone_number) || empty($body)) return;

		$validate = ContactService::validateNumber($phone_number);

		if (!$validate) return;

		$response = $this->provider->sendSms($phone_number, $body);

		return $response->status;
	}
}
