<?php

namespace App;

use App\Database\DB;
use phpDocumentor\Reflection\Types\Object_;

class Contact
{
	public $id = "";
	public $name = "";
	public $phone_number = "";

	function __construct(Object $user = null)
	{
		if ($user != null) {
			$this->id = $user->id;
			$this->name = $user->name;
			$this->phone_number = $user->phone_number;
		}
	}
}
