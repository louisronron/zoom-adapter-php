<?php

require_once("../zoom-meeting.php");

$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFlRnJtOGlVUUVLbUJDZHF0MU9nUlEiLCJleHAiOjE2MjUzMjE2NzgsImlhdCI6MTYyNDcxNjgxNH0.tIot15lt1Ptb6iWeaBYfWttqAX32EWRGzIb3oXm5ZIY";
$userid = ZoomMeetingAdapter::getUserIDByEmail("working-group@bcpng.page", $jwtToken);
$allMeetings = ZoomMeetingAdapter::listScheduledMeetings($userid, $jwtToken);
foreach($allMeetings as $meeting) {
    echo json_encode($meeting);
    echo "<br/>";
}