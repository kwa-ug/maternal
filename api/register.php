<?php 
	error_reporting(0);
	try {
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			include "conn.php";

			if(empty($_REQUEST['name'])) throw new Exception("name is invalid");
			if(empty($_REQUEST['contact'])) throw new Exception("contact is invalid");
			if(empty($_REQUEST['address'])) throw new Exception("address is invalid");
			if(empty($_REQUEST['last_period'])) throw new Exception("last_period is invalid");
			if(empty($_REQUEST['first_antenatal_visit'])) throw new Exception("first_antenatal_visit is invalid");
			if(empty($_REQUEST['language_preference'])) throw new Exception("language_preference is invalid");
			// if(empty($_REQUEST['email'])) throw new Exception("email is invalid");
			if(empty($_REQUEST['password'])) throw new Exception("password is invalid");
			$reg_date = date("Y-m-d h:i:sa");

			$name = $_REQUEST['name'];
			$contact = $_REQUEST['contact'];
			$address = $_REQUEST['address'];
			$last_period = $_REQUEST['last_period'];
			$first_antenatal_visit = $_REQUEST['first_antenatal_visit'];
			$language_preference = $_REQUEST['language_preference'];
			$email = $_REQUEST['email']?$_REQUEST['email']:rand(0,100000)."@sample.com";
			$password = $_REQUEST['password'];

			$sql = "INSERT INTO `users`(`id`, `name`, `contact`, `address`, `last_period`, `first_antenatal_visit`, `language_preference`, `email`, `password`, `reg_date`) VALUES (NULL,'$name','$contact','$address','$last_period','$first_antenatal_visit','$language_preference','$email','$password','$reg_date')";
			if ($conn->query($sql)) {

				header('HTTP/1.1 200 OK');
				header('Content-Type: application/json; charset=UTF-8');
				echo json_encode(array("msg"=>"Registration Successful", "redirect" => "login.html"));

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