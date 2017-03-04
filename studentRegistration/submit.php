<?php
	include('config.php');
	$access_token = Config::getAccessToken();
	
	$my_profile_id = Config::getProfileID();

	$pageId = "my_page_id";
	$student_name=($_POST['student_name']);
	$student_mail_address=($_POST['student_mail_address']);
	$student_home=($_POST['student_home']);
	$student_zipcode=($_POST['student_zipcode']);
	$student_dob=($_POST['student_dob']);
	$student_gender=($_POST['student_gender']);
	$student_email=($_POST['student_email']);
	$student_degree=($_POST['student_degree']);
	$student_citizenship=($_POST['student_citizenship']);
	$student_interest=($_POST['student_interest']);
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://app.iformbuilder.com/exzact/api/v60/profiles/$my_profile_id/pages/$pageId/records");

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);

	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt( $ch , CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt( $ch , CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{
	  \"fields\": [
		{
		  \"element_name\": \"student_name\",
		  \"value\": \"$student_name\"
		},
		{
		  \"element_name\": \"student_mail_address\",
		  \"value\": \"$student_mail_address\"
		},
		{
		  \"element_name\": \"student_home\",
		  \"value\": \"$student_home\"
		},
		{
		  \"element_name\": \"student_zipcode\",
		  \"value\": \"$student_zipcode\"
		},
		{
		  \"element_name\": \"student_dob\",
		  \"value\": \"$student_dob\"
		},
		{
		  \"element_name\": \"student_gender\",
		  \"value\": \"$student_gender\"
		},
		{
		  \"element_name\": \"student_email\",
		  \"value\": \"$student_email\"
		},
		{
		  \"element_name\": \"student_degree\",
		  \"value\": \"$student_degree\"
		},
		{
		  \"element_name\": \"student_interest\",
		  \"value\": \"$student_interest\"
		},
		{
		  \"element_name\": \"student_citizenship\",
		  \"value\": \"$student_citizenship\"
		}
		
	  ]
	}");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  "Content-Type: application/json",
	  "Authorization: Bearer $access_token"
	));

	$response = curl_exec($ch);
	curl_close($ch);
	header("location:viewAll.php");

?>