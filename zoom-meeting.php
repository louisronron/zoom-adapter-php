<?php

require_once __DIR__ . '/vendor/autoload.php';
use Curl\Curl;


class ZoomMeetingAdapter {




    public static function getUserIDByEmail($hostEmail, $bearerApiToken) {
        /*
            Gets the user ID by email (for meeting host)

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/users/user.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/users/'.$hostEmail);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array["id"];
        }



        /*


        Example API response

        
        {
            "created_at": "2018-11-15T01:10:08Z",
            "custom_attributes": [
              {
                "key": "cb3674544gexq",
                "name": "Country of Citizenship",
                "value": "Nepal"
              }
            ],
            "id": "z8dsdsdsdsdCfp8uQ",
            "first_name": "Harry",
            "last_name": "Grande",
            "email": "harryg@dfkjdslfjkdsfjkdsf.fsdfdfd",
            "type": 2,
            "role_name": "Owner",
            "pmi": 100000000,
            "use_pmi": false,
            "personal_meeting_url": "https://zoom.us/j/6352635623323434343443",
            "timezone": "America/Los_Angeles",
            "verified": 1,
            "dept": "",
            "last_login_time": "2019-09-13T21:08:52Z",
            "last_client_version": "4.4.55383.0716(android)",
            "pic_url": "https://lh4.googleusercontent.com/-hsgfhdgsfghdsfghfd-photo.jpg",
            "host_key": "0000",
            "jid": "hghghfghdfghdfhgh@xmpp.zoom.us",
            "group_ids": [],
            "im_group_ids": [
              "CcSAAAAAAABBBVoQ"
            ],
            "account_id": "EAAAAAbbbbbCCCCHMA",
            "language": "en-US",
            "phone_country": "USA",
            "phone_number": "00000000",
            "status": "active",
            "role_id": "hdsfwyteg3675hgfs",
            "manager": "name@example.com"
          }

        */

        
    }
















    public static function listMeetings($hostUserID, $bearerApiToken) {
        /*
            Lists all meetings organized by the host user.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetings.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/users/'.$hostUserID."/meetings");

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }


        /*

        Example API Response


        {
        "page_count": 1,
        "page_number": 1,
        "page_size": 30,
        "total_records": 4,
        "meetings": [
            {
            "uuid": "mlghmfghlBBB",
            "id": 11111,
            "host_id": "abckjdfhsdkjf",
            "topic": "Zoom Meeting",
            "type": 2,
            "start_time": "2019-08-16T02:00:00Z",
            "duration": 30,
            "timezone": "America/Los_Angeles",
            "created_at": "2019-08-16T01:13:12Z",
            "join_url": "https://zoom.us/j/11111"
            },
            {
            "uuid": "J8H8eavweUcd321==",
            "id": 2222,
            "host_id": "abckjdfhsdkjf",
            "topic": "TestMeeting",
            "type": 2,
            "start_time": "2019-08-16T19:00:00Z",
            "duration": 60,
            "timezone": "America/Los_Angeles",
            "agenda": "RegistrationDeniedTest",
            "created_at": "2019-08-16T18:30:46Z",
            "join_url": "https://zoom.us/j/2222"
            },
            {
            "uuid": "SGVTAcfSfCbbbb",
            "id": 33333,
            "host_id": "abckjdfhsdkjf",
            "topic": "My Meeting",
            "type": 2,
            "start_time": "2019-08-16T22:00:00Z",
            "duration": 60,
            "timezone": "America/Los_Angeles",
            "created_at": "2019-08-16T21:15:56Z",
            "join_url": "https://zoom.us/j/33333"
            },
            {
            "uuid": "64123avdfsMVA==",
            "id": 44444,
            "host_id": "abckjdfhsdkjf",
            "topic": "MyTestPollMeeting",
            "type": 2,
            "start_time": "2019-08-29T18:00:00Z",
            "duration": 60,
            "timezone": "America/Los_Angeles",
            "created_at": "2019-08-29T17:32:33Z",
            "join_url": "https://zoom.us/j/4444"
            }
        ]
        }


        */



    }

    












    public static function getMeeting($meetingID, $bearerApiToken) {
        /*
            Gets the details of a particular meeting.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meeting.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/meetings/'.$meetingID);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }




        /*


        Example API Request


        {
        "agenda": "API overview",
        "created_at": "2019-09-09T15:54:24Z",
        "duration": 60,
        "host_id": "ABcdofjdogh11111",
        "id": 1234555466,
        "join_url": "https://zoom.us/j/1234555466",
        "settings": {
            "alternative_hosts": "kjxckfjxgfgjdfk@dkjfhdskhf.com",
            "approval_type": 2,
            "audio": "both",
            "auto_recording": "local",
            "close_registration": false,
            "cn_meeting": false,
            "enforce_login": false,
            "enforce_login_domains": "mycompanydomain.com",
            "global_dial_in_countries": [
            "US"
            ],
            "global_dial_in_numbers": [
            {
                "city": "New York",
                "country": "US",
                "country_name": "US",
                "number": "+1 000011100",
                "type": "toll"
            },
            {
                "city": "San Jose",
                "country": "US",
                "country_name": "US",
                "number": "+1 6699006833",
                "type": "toll"
            },
            {
                "city": "San Jose",
                "country": "US",
                "country_name": "US",
                "number": "+1 221122112211",
                "type": "toll"
            }
            ],
            "host_video": false,
            "in_meeting": false,
            "join_before_host": true,
            "mute_upon_entry": false,
            "participant_video": false,
            "registrants_confirmation_email": true,
            "use_pmi": false,
            "waiting_room": false,
            "watermark": false,
            "registrants_email_notification": true
        },
        "start_time": "2019-08-30T22:00:00Z",
        "start_url": "https://zoom.us/1234555466/cdknfdffgggdfg4MDUxNjY0LCJpYXQiOjE1NjgwNDQ0NjQsImFpZCI6IjRBOWR2QkRqVHphd2J0amxoejNQZ1EiLCJjaWQiOiIifQ.Pz_msGuQwtylTtYQ",
        "status": "waiting",
        "timezone": "America/New_York",
        "topic": "My API Test",
        "type": 2,
        "uuid": "iAABBBcccdddd7A=="
        }



        */



    }



    public static function getMeetingInvitation($meetingID, $bearerApiToken) {
        /*
            Get a meeting invitation

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetinginvitation.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/meetings/'.$meetingID.'/invitation');

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array["invitation"];
        }

    }




    public static function listMeetingRegistrants($meetingID) {
        /*
            Lists all the registrants of a meeting.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrants.
        */
    }


    public static function addMeetingRegistrant($meetingID) {
        /*
            Adds a new meeting registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrantcreate.
        */
    }


    public static function deleteMeetingRegistrant($meetingID) {
        /*
            Deletes a new meeting registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrantdelete.
        */
    }


}


// user id: NLRyvAJGR9OatxB_sxc5bA

// $result = ZoomMeetingAdapter::getUserIDByEmail("louisronsonronald@gmail.com", 
// "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6ImRRWEo4X1JQVDRXX3ZLd0FKSks0M1EiLCJleHAiOjE2MjUwMzA4NTUsImlhdCI6MTYyNDQyNjA1OX0.p0WB4EBiMw3RHdXIt8FxH2Sg7vFFV9bq9YAchUD4LXk");

// echo $result;
$userID = "NLRyvAJGR9OatxB_sxc5bA";
$bearerApiToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6ImRRWEo4X1JQVDRXX3ZLd0FKSks0M1EiLCJleHAiOjE2MjUwMzA4NTUsImlhdCI6MTYyNDQyNjA1OX0.p0WB4EBiMw3RHdXIt8FxH2Sg7vFFV9bq9YAchUD4LXk";

$result = ZoomMeetingAdapter::listMeetings($userID,$bearerApiToken);

$result = ZoomMeetingAdapter::getMeetingInvitation("75161416520",$bearerApiToken);

echo $result;