<?php

namespace Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

use App\Mobile;
use App\Contact;
use App\Data\CarrierInterfaceImpl;

class MobileTest extends TestCase
{

	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$mobile = new Mobile(new CarrierInterfaceImpl());
		$this->assertNull($mobile->makeCallByName(''));
	}

	/** @test */
	public function it_not_return_a_contact()
	{
		$mobile = new Mobile(new CarrierInterfaceImpl());
		$this->assertNull($mobile->makeCallByName('Oscars'));
	}

	/** @test */
	public function it_make_a_call()
	{
		$mobile = new Mobile(new CarrierInterfaceImpl());
		$this->assertNotEmpty($mobile->makeCallByName("Oscar"));
	}

	/** @test */
	public function it_send_a_message()
	{
		$mobile = new Mobile(new CarrierInterfaceImpl());
		$this->assertEquals("queued", $mobile->sendMessagebyName("+51902646055", "Hola"));
	}
}
