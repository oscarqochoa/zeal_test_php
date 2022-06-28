<?php

namespace App\Services;

use App\Contact;
use App\Database\DB;

use Twilio\Rest\Client;

class ContactService
{
	public static function findByName($name): Contact
	{
		$response = DB::select("SELECT * from users where name = \"{$name}\"");

		if (count($response) == 0) {
			return new Contact();
		}

		$contact = new Contact($response[0]);
		return $contact;
	}

	public static function validateNumber(string $number): bool
	{

		$tw_account_id = "AC42ab2342bca9f99a1cede0aeb25fdafa";
		$tw_auth_token = "411080089c233610f211197ea4d7bc76";

		$client = new Client($tw_account_id, $tw_auth_token);

		$phone_number = str_replace(" ", "", $number);
		$f_phone_number = str_replace("+51", "", $phone_number);

		if (strlen($f_phone_number) == 9) {

			$number = $client->lookups->v1->phoneNumbers($number)
				->fetch(["type" => ["carrier"]]);

			if ($number->carrier["type"] == "mobile") {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
