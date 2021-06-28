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


    public static function addRoom($bearerApiToken, $name, $type, $locationID="") {
        /*
            Adds a new Zoom Room

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/rooms/addaroom.
        */

        $curl = new Curl();

        $data = [
            "name" => $name,
            "type" => $type,
            "location_id" => $locationID,
        ];

        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->setHeader('Content-Type', 'application/json');
        $curl->post('https://api.zoom.us/v2/rooms', $data);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }

    }


    public static function getRoomProfile($roomID, $bearerApiToken) {
        /*
            Gets a Zoom Room Profile information

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/rooms/getzrprofile.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->get('https://api.zoom.us/v2/rooms/'.$roomID);

        if($curl->error) {
            return false;
        } else {
            $array = json_decode(json_encode($curl->response), true);
            return $array;
        }
    }


    public static function deleteRoom($roomID, $bearerApiToken) {
        /*
            Deletes a Zoom Room by ID

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/rooms/deleteazoomroom.
        */

        $curl = new Curl();
        $curl->setHeader('Authorization', 'Bearer ' . $bearerApiToken);
        $curl->delete('https://api.zoom.us/v2/rooms/'.$roomID);

        if($curl->error) {
            return false;
        } else {
            return true;
        }
    }

}