<?php

namespace App;


class Call
{
	public $id = "";

	function __construct($id = null)
	{
		if ($id != null) {
			$this->id = $id;
		}
	}
}
