<?php 
	error_reporting(0);
	try {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			include "conn.php";

			if(empty($_REQUEST['id'])) throw new Exception("An error Occured");
			if(empty($_REQUEST['name'])) throw new Exception("name is invalid");
			if(empty($_REQUEST['contact'])) throw new Exception("contact is invalid");
			if(empty($_REQUEST['address'])) throw new Exception("address is invalid");
			// if(empty($_REQUEST['email'])) throw new Exception("email is invalid");
			$reg_date = date("Y-m-d h:i:sa");

			$id = $_REQUEST['id'];
			$name = $_REQUEST['name'];
			$contact = $_REQUEST['contact'];
			$address = $_REQUEST['address'];
			$email = $_REQUEST['email']?$_REQUEST['email']:rand(0,100000)."@sample.com";

			$sql = "UPDATE users SET name = '$name', email = '$email', contact = '$contact', address = '$address' WHERE id = '$id' LIMIT 1";
			if ($conn->query($sql)) {

				$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
				$at = $conn->query($sql)->fetch_assoc();
				unset($at['password']);

				header('HTTP/1.1 200 OK');
				header('Content-Type: application/json; charset=UTF-8');
				echo json_encode(array("msg"=>"Profile Saved Successful", "store_key" => "user_info", "user_info"=>$at));

			}else{
				throw new Exception("Something Went wrong");
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