<?php

require_once("../zoom-meeting.php");

$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFlRnJtOGlVUUVLbUJDZHF0MU9nUlEiLCJleHAiOjE2MjUzMjE2NzgsImlhdCI6MTYyNDcxNjgxNH0.tIot15lt1Ptb6iWeaBYfWttqAX32EWRGzIb3oXm5ZIY";
$userid = ZoomMeetingAdapter::getUserIDByEmail("working-group@bcpng.page", $jwtToken);

$addRegistrant = ZoomMeetingAdapter::addMeetingRegistrant("97804110143", "John", "Bob", "info@bepacificdigital.com.pg", $jwtToken);
if($addRegistrant) echo "Added Successfully";
else echo "Unsuccessful";

// $registrants = ZoomMeetingAdapter::listMeetingRegistrants("97804110143", $jwtToken);
// echo json_encode($registrants);