<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>


	</style>
</head>
<body>

<div id="container">
	<h1>Members Page</h1>
		<?php 
			echo "<pre>";
			//echo $this->session->all_userdata();
			print_r( $this->session->all_userdata());
			echo "</pre>";
		?>
	<a href="<?php echo base_url().'index.php/main/logout'?>">Logout</a>

</div>

</body>
</html>