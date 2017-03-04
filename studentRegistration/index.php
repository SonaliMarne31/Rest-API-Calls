<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student Registration</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<body>
	<div class="title">Student Login Form</div>
	<form class="loginbox" action="login.php" method="post" id="login_form">
		<div class="wrap_form"><label class='label_for' for="username">Username</label>	
		<input type="text" name="username" placeholder="username" required></div>
		<div class="line_separator">
			<i></i>
		</div>
		<div class="wrap_form"><label class='label_for' for="password">Password</label>
		<input type="password" name="password" placeholder="password" required></div>
		<input type="submit"></input>
	</form>
</body>
</html>