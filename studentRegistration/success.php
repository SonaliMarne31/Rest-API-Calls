<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student Registration</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <script type="text/javascript">
    function submitForm(action, method)
    {
        document.getElementById('student_form').action = action;
		document.getElementById('student_form').method = method;
        document.getElementById('student_form').submit();
    }
</script>
</head>

<body>
	<div class="form_title">Student Registration Form</div>
	<form class="loginbox" id="student_form">
		
		<div class="wrap_form"><label class='label_for' for="student_name">Student Name</label>
		<input type="text" name="student_name" placeholder="Student Name" required></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_mail_address">Mail Address</label>
		<input type="text" name="student_mail_address" placeholder="Mail Address" ></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_home">Home Address</label>
		<input type="text" name="student_home" placeholder="Home Address" ></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_zipcode">Zip Code</label>
		<input type="text" name="student_zipcode" placeholder="Zip Code" ></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_dob">Date of Birth</label>
		<input type="text" id="datepicker" name="student_dob" placeholder="yyyy-mm-dd"/></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_gender">Gender</label>
		<input type='text' name="student_gender" placeholder='Gender'></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_email">Email</label>
		<input type="email" name="student_email" placeholder="Email"></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_interest">Your Interest</label>
		<input type='text' name="student_interest" placeholder='Your Interest'></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_degree">Your Degree</label>
		<input type='text' name="student_degree" placeholder='Your Degree'></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="student_citizenship">Citizenship</label>
		<input type="text" name="student_citizenship" placeholder="Citizenship"></div>
		<input type="submit" onclick="submitForm('submit.php','POST')" value="Submit"/>
		<input type="submit" onclick="submitForm('logged.php','GET')" value="Back"/>
	</form>
</body>
</html>