<?php
include('config.php');
	
	$profileID = Config::getProfileID();
	$pageID = "my_page_id";
	$second_load = false;
	if($_GET){
		$second_load = true;
		if(isset($_GET['search']) && isset($_GET['search_id'])){
			$search_id = $_GET['search_id'];
			$url = "https://server_name.domain.com/exzact/api/v60/profiles/$profileID/pages/$pageID/records/$search_id";
			$response = restAPI_call($url);
			$json_record = json_decode($response);
		}elseif(isset($_GET['back'])){
			header("location:logged.php");
		}
	}
	echo "<html><head><meta charset='UTF-8'><title>Student Registration</title><link rel='stylesheet' href='css/reset.css'><link rel='stylesheet' href='css/style.css' media='screen' type='text/css'/></head><body>";
	echo "<div class='form_title'>Student Search Form</div>";
	echo "<form class='loginbox' action='search.php'><input type='text' name='search_id' placeholder='Enter Record ID to Search'/><input type='submit' name='search' value='Search'/><input type='submit' name='back' value='Back'/></form>";	
	echo "<table id='table_format'>";
	echo "<tr><th>Student ID.</th><th>Student Name</th><th>Email Address</th></tr>";
	if(isset($json_record->error_message) && $second_load){
		echo "<tr><td></td><td>".'NO RECORD FOUND'."</td><td></td></tr>";
	}elseif($second_load){
		echo "<tr><td>".'1'."</td><td>".$json_record->student_name."</td><td>".$json_record->student_email."</td></tr>";
	}
	echo "</table>";
	echo "</body></html>";
	
	function restAPI_call($url){
		$a_token = Config::getAccessToken();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer $a_token"
		));
		curl_setopt( $ch , CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch , CURLOPT_SSL_VERIFYHOST, 0 );
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

?>