<?php 
	error_reporting(0);
	try {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			include "conn.php";

			if(empty($_REQUEST['identifier'])) throw new Exception("credentials required");

			$identifier = $_REQUEST['identifier'];
			$password = $_REQUEST['password'];

			$sql = "SELECT * FROM users WHERE (email = '$identifier' || contact = '$identifier') AND password = '$password' LIMIT 1";
			$at = $conn->query($sql);
			if ($at->num_rows > 0) {

				$stat = $at->fetch_assoc();

				unset($stat['password']);

				header('HTTP/1.1 200 OK');
				header('Content-Type: application/json; charset=UTF-8');
				echo json_encode(array("msg"=>"Login successful", "store_key" => "user_info", "user_info"=>$stat, "redirect"=>"dashboard.html"));

			}else{
				throw new Exception("Invalid credentials");
			}

		}else{
			throw new Exception("Invalid Request Method");
		}
	} catch (Exception $e) {
		header('HTTP/1.1 422 Unprocessable Entity');
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode(array('errorMsg' => ucwords($e->getMessage())));
	}

 ?>