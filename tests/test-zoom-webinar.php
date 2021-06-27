<?php

require_once("../zoom-webinar.php");

$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFlRnJtOGlVUUVLbUJDZHF0MU9nUlEiLCJleHAiOjE2MjUzMjE2NzgsImlhdCI6MTYyNDcxNjgxNH0.tIot15lt1Ptb6iWeaBYfWttqAX32EWRGzIb3oXm5ZIY";
$userid = WebinarAdapter::getUserIDByEmail("working-group@bcpng.page", $jwtToken);

$webinars = WebinarAdapter::listWebinars($userid, $jwtToken, $pageSize=100);
// echo json_encode($webinars);

$webinar = WebinarAdapter::getWebinar("94523063172", $jwtToken);
echo json_encode($webinar);

// $registrants = ZoomMeetingAdapter::listMeetingRegistrants("97804110143", $jwtToken);
// echo json_encode($registrants);