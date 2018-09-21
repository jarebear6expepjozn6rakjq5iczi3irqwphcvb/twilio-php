<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Authy\Service;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class EntityTest extends HolodeckTestCase {
    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->entities->create("identity");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('Identity' => "identity", );

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/Authy/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Entities',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "YEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "ff483d1ff591898a9942916050d2ca3f",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f",
                "links": {
                    "factors": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f/Factors"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->entities->create("identity");

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->entities->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Authy/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Entities'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "entities": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "entities"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->entities->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "entities": [
                    {
                        "sid": "YEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "identity": "ff483d1ff591898a9942916050d2ca3f",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_updated": "2015-07-30T20:00:00Z",
                        "url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f",
                        "links": {
                            "factors": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f/Factors"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "entities"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->entities->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->entities("identity")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Authy/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Entities/identity'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "YEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "ff483d1ff591898a9942916050d2ca3f",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f",
                "links": {
                    "factors": "https://preview.twilio.com/Authy/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Entities/ff483d1ff591898a9942916050d2ca3f/Factors"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->authy->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->entities("identity")->fetch();

        $this->assertNotNull($actual);
    }
}