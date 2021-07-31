<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Conversations\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ParticipantConversationTest extends HolodeckTestCase {
    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->conversations->v1->participantConversations->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://conversations.twilio.com/v1/ParticipantConversations'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "conversations": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://conversations.twilio.com/v1/ParticipantConversations?Identity=identity&PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://conversations.twilio.com/v1/ParticipantConversations?Identity=identity&PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "conversations"
                }
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->participantConversations->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullByIdentityResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "conversations": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "conversation_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "participant_sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "conversation_friendly_name": "friendly_name",
                        "conversation_state": "inactive",
                        "conversation_timers": {
                            "date_inactive": "2015-12-16T22:19:38Z",
                            "date_closed": "2015-12-16T22:28:38Z"
                        },
                        "conversation_attributes": "{}",
                        "conversation_date_created": "2015-07-30T20:00:00Z",
                        "conversation_date_updated": "2015-07-30T20:00:00Z",
                        "conversation_created_by": "created_by",
                        "conversation_unique_name": "unique_name",
                        "participant_user_sid": "USaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "participant_identity": "identity",
                        "participant_messaging_binding": null,
                        "links": {
                            "participant": "https://conversations.twilio.com/v1/Conversations/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "conversation": "https://conversations.twilio.com/v1/Conversations/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://conversations.twilio.com/v1/ParticipantConversations?Identity=identity&PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://conversations.twilio.com/v1/ParticipantConversations?Identity=identity&PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "conversations"
                }
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->participantConversations->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullByAddressResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "conversations": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "chat_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "conversation_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "participant_sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "conversation_friendly_name": "friendly_name",
                        "conversation_state": "inactive",
                        "conversation_timers": {
                            "date_inactive": "2015-12-16T22:19:38Z",
                            "date_closed": "2015-12-16T22:28:38Z"
                        },
                        "conversation_attributes": "{}",
                        "conversation_date_created": "2015-07-30T20:00:00Z",
                        "conversation_date_updated": "2015-07-30T20:00:00Z",
                        "conversation_created_by": "created_by",
                        "conversation_unique_name": "unique_name",
                        "participant_user_sid": null,
                        "participant_identity": null,
                        "participant_messaging_binding": {
                            "address": "+375255555555",
                            "proxy_address": "+12345678910",
                            "type": "sms",
                            "level": null,
                            "name": null,
                            "projected_address": null
                        },
                        "links": {
                            "participant": "https://conversations.twilio.com/v1/Conversations/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "conversation": "https://conversations.twilio.com/v1/Conversations/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://conversations.twilio.com/v1/ParticipantConversations?Address=%2B375255555555&PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://conversations.twilio.com/v1/ParticipantConversations?Address=%2B375255555555&PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "conversations"
                }
            }
            '
        ));

        $actual = $this->twilio->conversations->v1->participantConversations->read();

        $this->assertNotNull($actual);
    }
}