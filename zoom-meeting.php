<?php

require_once __DIR__ . '/vendor/autoload.php';


class ZoomMeetingAdapter {




    public static function getUserIDByEmail($hostEmail) {
        /*
            Gets the user ID by email (for meeting host)

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/users/user.
        */

        

    }




    public static function listMeetings($hostUserID) {
        /*
            Lists all meetings organized by the host user.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetings.
        */

    }

    

    public static function getMeeting($meetingID) {
        /*
            Gets the details of a particular meeting.

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meeting.
        */
    }



    public static function getMeetingInvitation($meetingID) {
        /*
            Get a meeting invitation

            This function calls the REST API endpoint documented
            at https://marketplace.zoom.us/docs/api-reference/zoom-api/meetings/meetinginvitation.
        */
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