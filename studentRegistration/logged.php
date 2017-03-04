<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student Registration</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<script type="text/javascript">
    function submitForm(action, method)
    {
        document.getElementById('student_form').action = action;
		document.getElementById('student_form').method = method;
        document.getElementById('student_form').submit();
    }
</script>

<body>
	<div class="title">Student Database</div>
	<form class="loginbox" id="student_form">	
		<input type="submit" onclick="submitForm('viewAll.php','GET')" value="View All"/>
		<input type="submit" onclick="submitForm('success.php','POST')" value="Register"/>
		<input type="submit" onclick="submitForm('search.php','GET')" value="Search Student"/>
	</form>
</body>
</html>