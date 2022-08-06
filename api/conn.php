<?php 
    error_reporting(0);

	date_default_timezone_set("Africa/Kampala");
	
	$now = new DateTime();
    $mins = $now->getOffset() / 60;
    $sgn = ($mins < 0 ? -1 : 1);
    $mins = abs($mins);
    $hrs = floor($mins / 60);
    $mins -= $hrs * 60;
    $date_default_offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);

    $conn = new mysqli("localhost", "root", "", "maternal");

	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$conn->query("SET time_zone='$date_default_offset';");

    $conn->query("SET SESSION sql_mode = '';");
?>
