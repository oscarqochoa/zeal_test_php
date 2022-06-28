<?php

namespace Tests\Services;

use Mockery as m;
use PHPUnit\Framework\TestCase;

use App\Contact;
use App\Services\ContactService;

class ContactServiceTest extends TestCase
{

    /** @test */
    public function it_returns_if_number_is_valid()
    {
        $validate = ContactService::validateNumber("+51902646055");
        $this->assertEquals(true, $validate);
    }

    /** @test */
    public function it_returns_a_user_by_name()
    {

        $service = new ContactService();

        $contact = new Contact((object)
        [
            "id" => 1,
            "name" => "Oscar",
            "phone_number" => "902646055"
        ]);

        $user = $service->findByName("Oscar");

        $this->assertEquals(
            $contact->name,
            $user->name
        );
    }
}
