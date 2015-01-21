<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


	</style>
</head>
<body>

<div id="container">
	<h1>SIgn Up Page</h1>
	<?php 

		echo form_open('index.php/main/signup_validation');
		echo validation_errors();
			echo "<p> Email";
			echo form_input('email',$this->input->post('email'));
			echo "</p>";

			echo "<p> Password";
			echo form_password('password');
			echo "</p>";
			echo "<p> Confirm Password";
			echo form_password('cpassword');
			echo "</p>";

			echo "<p>";
			echo form_submit('signup_submit','Submit');
			echo "</p>";
		echo form_close();
	?>
</br>
<a href="<?php echo base_url().'index.php/main/logout'?>">log out</a>	 

</div>

</body>
</html>