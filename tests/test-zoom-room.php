<?php

require_once("../zoom-room.php");

$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFlRnJtOGlVUUVLbUJDZHF0MU9nUlEiLCJleHAiOjE2MjUzMjE2NzgsImlhdCI6MTYyNDcxNjgxNH0.tIot15lt1Ptb6iWeaBYfWttqAX32EWRGzIb3oXm5ZIY";
$rooms = RoomAdapter::addRoom($jwtToken, "Made Via PHP Room", "ZoomRoom");
echo json_encode($rooms);