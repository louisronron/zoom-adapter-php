<?php

require_once("../zoom-meeting.php");

$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFlRnJtOGlVUUVLbUJDZHF0MU9nUlEiLCJleHAiOjE2MjUzMjE2NzgsImlhdCI6MTYyNDcxNjgxNH0.tIot15lt1Ptb6iWeaBYfWttqAX32EWRGzIb3oXm5ZIY";
$userid = ZoomMeetingAdapter::getUserIDByEmail("working-group@bcpng.page", $jwtToken);

// $addRegistrant = ZoomMeetingAdapter::addMeetingRegistrant("97804110143", "info@bepacificdigital.com.pg", "John", "Bob", $jwtToken);
// if($addRegistrant) echo "Added Successfully";
// else echo "Unsuccessful";

$meetings = ZoomMeetingAdapter::listMeetings("HORyzk_vTFil0YwYEUhMKw", $jwtToken, $pageSize=4, $pageNumber=5);
echo json_encode($meetings);

// $registrants = ZoomMeetingAdapter::listMeetingRegistrants("97804110143", $jwtToken);
// echo json_encode($registrants);