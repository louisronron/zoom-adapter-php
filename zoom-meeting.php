<?php

/*

Contains classes, functions, and other functionality to manipulate and manage Zoom Meetings
By Louis Ronald

*/


require_once __DIR__ . '/vendor/autoload.php';

// Documentation for php-curl-class at https://github.com/php-curl-class/php-curl-class 
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




    public static function listMeetingRegistrants($meetingID, $bearerApiToken) {
        /*
            Lists all the registrants of a meeting.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetingregistrants.
        */
        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/meetings/'.$meetingID.'/registrants');

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }


    }


    public static function addMeetingRegistrant($meetingID, $email, $first_name, $last_name,
        $address, $city, $country, $zip, $state, $phone, $industry, $org, $job_title, 
        $purchasing_time_frame, $role_in_purchase_process, $no_of_employees, $comments) 
    {
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