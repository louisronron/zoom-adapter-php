<?php

require_once __DIR__ . '/vendor/autoload.php';

// Documentation for php-curl-class at https://github.com/php-curl-class/php-curl-class 
use Curl\Curl;


class WebinarAdapter {



    public static function getUserIDByEmail($hostEmail, $bearerApiToken) {
        /*
            Gets the user ID by email (for webinar host)

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
    }



    public static function listWebinars($hostUserID, $bearerApiToken, $pageSize=30, $nextPageToken="") {
        /*
            Lists all meetings organized by the host user.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinars.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/users/'.$hostUserID."/webinars", [
            "page_size" => $pageSize,
            "next_page_token" => $nextPageToken,
        ]);

        if($curl->error) {
            echo $curl->errorCode . " " . $curl->errorMessage;
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }
    }


    public static function getWebinar($webinarID, $bearerApiToken) {
        /*
            Gets the details of a particular webinar.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinar.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/webinars/'.$webinarID);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }

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



    public static function listMeetingRegistrants($meetingID, $bearerApiToken, $pageSize=30, $nextPageToken="") {
        /*  
            Lists all the registrants of a meeting.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrants.
        */
        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants', [
            "page_size" => $pageSize,
            "next_page_token" => $nextPageToken
        ]);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }


    }



    public static function addMeetingRegistrant($meetingID, $email, $first_name, $last_name, $bearerApiToken,
        $address="", $city="", $country="", $zip="", $state="", $phone="", $industry="", $org="", $job_title="", 
        $purchasing_time_frame="", $role_in_purchase_process="", $no_of_employees="", $comments="") {
        /*
            Adds a new meeting registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrantcreate.
        */

        $curl = new Curl();

        $data = [
            "email" => $email,
            "first_name" => $first_name,
            "last_name" => $last_name,
        ];

        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->setHeader('Content-Type', 'application/json');
        $curl->post('https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants', $data);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }

    }



    public static function deleteMeetingRegistrant($meetingID, $registrantID, $bearerApiToken) {
        /*
            Deletes a new meeting registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrantdelete.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->delete('https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants/'.$registrantID);

        if($curl->error) {
            return false;
        } else {
            return true;
        }

    }


}