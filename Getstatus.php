<?php
include("includes/db.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

$query = "SELECT * FROM users WHERE user_email = '{$user_id}'";					// Select all data in table "status"
$result = mysqli_query($connection, $query);

$data_array = array();

while ($row = mysqli_fetch_assoc($result)) {
	$bulb1_status = (int) $row["bulb1_status"];
	$bulb1_state= (int) $row["bulb1_state"];
	$bulb2_status = (int) $row["bulb2_status"];
	$waterValve_status = (int) $row["waterValve_status"];
	$waterPump_status = (int) $row["waterPump_status"];
	$fan_status = (int) $row["fan_status"];
	$fanSpeed = (int) $row["fan_speed"];

	$stdClass = new stdClass();
	$stdClass->bulb1_status = $bulb1_status;
	$stdClass->bulb1_state = $bulb1_state;
	$stdClass->bulb2_status = $bulb2_status;
	$stdClass->waterValve_status = $waterValve_status;
	$stdClass->waterPump_status = $waterPump_status;
	$stdClass->fan_status = $fan_status;
	$stdClass->fan_speed = $fanSpeed;


	array_push($data_array, $stdClass);
}

$data_array = json_encode($data_array);
$data_array = trim($data_array, '[]');
echo $data_array;
