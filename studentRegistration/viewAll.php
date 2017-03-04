<?php
include('config.php');
	
	$profileID = Config::getProfileID();
	$pageID = "my_page_id";
	$delete_id_not_found = false;
	$url = "https://server_name.domain.com/exzact/api/v60/profiles/$profileID/pages/$pageID/records";
	$all_json = getAllRecords($url);
	
	if($_GET){
		if(isset($_GET['delete']) && isset($_GET['delete_id'])){
			$deleteID = $_GET['delete_id'];
			$delURL = "https://server_name.domain.com/exzact/api/v60/profiles/$profileID/pages/$pageID/records/$deleteID";
			$del_response = restAPI_call($delURL);
			$json_record = json_decode($del_response);
			
			if(isset($json_record->error_message)){
				$delete_id_not_found = true;
			} else {
				deleteRecord($delURL);
				header("location:viewAll.php");
			}
		}elseif(isset($_GET['addnew'])){
			header("location:success.php");
		}elseif(isset($_GET['back'])){
			header("location:logged.php");
		}
	}
	
	echo "<html><head><meta charset='UTF-8'><title>Student Registration</title><link rel='stylesheet' href='css/reset.css'><link rel='stylesheet' href='css/style.css' media='screen' type='text/css'/></head><body>";
	echo "<table id='table_format'>";
	echo "<tr><th>Sr. No.</th><th>Student Name</th><th>Email Address</th></tr>";
	
	
	for($i = 0 ; $i < sizeof($all_json) ; $i++){
		$recordID = $all_json[$i]['id'];
		$record = getUserDetails($recordID, $profileID, $pageID);
		$json_record = json_decode($record);
		echo "<tr><td>".$recordID."</td><td>".$json_record->student_name."</td><td>".$json_record->student_email."</td></tr>";
	}
	echo "</table>";
	if($delete_id_not_found === true){
		echo "<div class='form_title'>Record not found</div>";
	} 
	echo "<form class='loginbox' action='viewAll.php'><input type='text' name='delete_id' placeholder='Enter Record ID to delete'/><input type='submit' name='delete' value='Delete'/>";
	echo "<input type='submit' name='addnew' value='Add new Record'/>";
	echo "<input type='submit' name='back' value='Back'/>";
	echo "</form></body></html>";

	function getUserDetails($recordID, $profileID, $pageID){
		$url = "https://server_name.domain.com/exzact/api/v60/profiles/$profileID/pages/$pageID/records/$recordID";
		return restAPI_call($url);
		
	}
	
	function getAllRecords($url){
		$response = restAPI_call($url);
		$json = json_decode($response,true);
		return $json;
	}
	
	function deleteRecord($delURL) {
		$ch = curl_init();
		$a_token = Config::getAccessToken();
		curl_setopt($ch, CURLOPT_URL, $delURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Authorization: Bearer $a_token"
		));
		curl_setopt( $ch , CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch , CURLOPT_SSL_VERIFYHOST, 0 );
		$response = curl_exec($ch);
		curl_close($ch);
		unset($_GET['delete']);
		unset($_GET['delete_id']);
		header("location:viewAll.php");
	}
	
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