<?php

require_once __DIR__ . '/vendor/autoload.php';

// Documentation for php-curl-class at https://github.com/php-curl-class/php-curl-class 
use Curl\Curl;


class RoomAdapter {



    public static function getRooms($bearerApiToken, $status="", $type="", $unassignedRooms=false,
    $pageSize=30, $nextPageToken="", $locationID="") {
        /*
            Gets all Zoom Rooms created under current account (indicated by bearer Token)

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/rooms/listzoomrooms.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/rooms', [
            'status' => $status, 
            'type' => $type, 
            'unassigned_rooms' => $unassignedRooms,
            'page_size' => $pageSize,
            'next_page_token' => $nextPageToken,
            'location_id' => $locationID,
        ]);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
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



    public static function listApprovedWebinarRegistrants($webinarID, $bearerApiToken, $pageSize=30, $nextPageToken="") {
        /*  
            Lists all the registrants of a webinar that have been approved.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinarregistrants.
        */
        $registrantStatus = "approved";
        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/webinars/'.$webinarID.'/registrants', [
            "page_size" => $pageSize,
            "next_page_token" => $nextPageToken,
            "status" => $registrantStatus,
        ]);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }
    }



    public static function listPendingWebinarRegistrants($webinarID, $bearerApiToken, $pageSize=30, $nextPageToken="") {
        /*  
            Lists all the registrants of a webinar that are pending.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinarregistrants.
        */
        $registrantStatus = "pending";
        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/webinars/'.$webinarID.'/registrants', [
            "page_size" => $pageSize,
            "next_page_token" => $nextPageToken,
            "status" => $registrantStatus,
        ]);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }
    }



    public static function listDeniedWebinarRegistrants($webinarID, $bearerApiToken, $pageSize=30, $nextPageToken="") {
        /*  
            Lists all the registrants of a webinar that have been denied.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinarregistrants.
        */
        $registrantStatus = "denied";
        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/webinars/'.$webinarID.'/registrants', [
            "page_size" => $pageSize,
            "next_page_token" => $nextPageToken,
            "status" => $registrantStatus,
        ]);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }
    }



    public static function addWebinarRegistrant($webinarID, $email, $first_name, $last_name, $bearerApiToken,
        $address="", $city="", $country="", $zip="", $state="", $phone="", $industry="", $org="", $job_title="", 
        $purchasing_time_frame="", $role_in_purchase_process="", $no_of_employees="", $comments="") {
        /*
            Adds a new webinar registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/webinarregistrantcreate.
        */

        $curl = new Curl();

        $data = [
            "email" => $email,
            "first_name" => $first_name,
            "last_name" => $last_name,
        ];

        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->setHeader('Content-Type', 'application/json');
        $curl->post('https://api.zoom.us/v2/webinars/'.$webinarID.'/registrants', $data);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }

    }



    public static function deleteWebinarRegistrant($webinarID, $registrantID, $bearerApiToken) {
        /*
            Deletes a webinar registrant

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/webinars/deletewebinarregistrant.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->delete('https://api.zoom.us/v2/webinars/'.$webinarID.'/registrants/'.$registrantID);

        if($curl->error) {
            return false;
        } else {
            return true;
        }

    }


}