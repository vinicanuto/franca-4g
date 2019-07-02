<?php

require_once "db.inc.php";

$sql = "SELECT site_id,longitude,latitude FROM torre";
$result = $conn->query($sql);
$points = array();

while ($row = $result->fetch_assoc()) {
//    $name = $row['site_id'];
//    $lat = $row['latitude'];
//    $lon = $row['longitude'];
//    $latlong = $lat . ", " . $lon;
//    array_push($new, $latlong);
    $points[] = $row;
}
echo json_encode($points); // raw data, not json encoded]
?>  