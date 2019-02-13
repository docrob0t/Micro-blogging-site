<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Login Page</title>
	</head>

	<body>
		<?php echo "<h2>".$title."</h2>"?>

		<div class="loginPage">
			<?php echo form_open(base_url().'index.php/user/dologin');?>
				<div class="Warning">
					<?php
						echo $this->session->flashdata('error');
					?>
				</div>
				<div class="form_group form-row">
					<label class="col-2 col-form-label">Enter Username: </label>
					<?php 
						$username = array(
							'name'        => 'username',
							'class'       => 'form-control col-3',
							'placeholder' => 'Username'
						);
						
						echo form_input($username);
					?>
					<span class="text-incorrect"><?php echo form_error('username'); ?></span>
				</div>
				<div class="form_group form-row">
					<label class="col-2 col-form-label">Enter Password: </label>
					<?php 
						$password = array(
							'name'        => 'password',
							'class'       => 'form-control col-3',
							'placeholder' => 'Password'
						);
						
						echo form_password($password);
					?>
					<span class="text-incorrect"><?php echo form_error('password'); ?></span>
				</div>
				<div class="form_group">
					<?php 
						$logInButton = array(
							'name'        => 'insert',
							'class'       => 'btn btn-info',
							'value'       => 'Login'
						);
						
						echo form_submit($logInButton);
					?>
				</div>
			<?php echo form_close();?>
        </div>
	</body>
</html>
