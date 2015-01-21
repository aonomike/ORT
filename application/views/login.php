
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title> Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="Mike Aono" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate, post-check=0, pre-check=0" /> 
    <meta http-equiv="Pragma" content="no-cache" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/css/login.css" />
    <link rel="stylesheet" href="<?PHP echo base_url();?>assets/plugins/magic/magic.css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon">
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="<?PHP echo base_url();?>assets/img/logo1.jpg" id="logoimg" alt=" OR TRACKING SYSTEM" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <?php echo validation_errors()?>
           <!-- <form action="<?php echo base_url(); ?>Users/user_login" class="form-signin">  -->
            <?php
            $attributes = array('class' =>'form-signin', 'id'=>'login_form','name'=>'login_form'  );
                echo form_open('Users/user_login',$attributes);
             ?>        
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                 <p style="color:red;"><?php echo $error ?></p>  
                <input type="text" placeholder="Username" class="form-control" id="username" required="required" name="username" value="<?php echo set_value('username'); ?>" />
                <input type="password" placeholder="Password" class="form-control" required="required" name="password" id="password" />
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
                <button class="btn text-muted text-center btn-warning" type="reset">Cancel</button>                
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input type="text" placeholder="First Name" class="form-control" />
                <input type="text" placeholder="Last Name" class="form-control" />
                <input type="text" placeholder="Username" class="form-control" />
                <input type="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" placeholder="password" class="form-control" />
                <input type="password" placeholder="Re type password" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#" data-toggle="tab" id="logins">Login</a></li>
            <li><a class="text-muted" href="#" ="forgot" data-toggle="tab" id="fogpass">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab" id="signups">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      <!--javascript-->

      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>
   	  <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
   	 
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
