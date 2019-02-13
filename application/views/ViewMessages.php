<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<title>View Messeges</title>
	</head>
	<body>
	
	<!-- Follow button -->
	
	<?php 
	// Check if it is on the View page.
	if (isset($view)) 
	{
		if ($this->session->userdata('username') != $name) 
		{
			if (!$isFollowing) 
			{
				$follower = $this->session->userdata("username");
			
				$attributes = array(
					'class'       => 'form-inline'
				);

				$hidden =  array(
					'follower'    => $follower, 
					'followed'    => $name
				);

				echo form_open('user/follow/'.$follower.'/'.$name, $attributes, $hidden);
			
				$followButton = array(
					'name'        => 'insert',
					'class'       => 'btn btn-info',
					'value'       => 'Follow'
				);

				echo form_submit($followButton);	
				echo form_close();
			}
			else
			{
				// Followed button
				echo '<button type="button" class="btn btn-info disabled">Followed</button>';
			}
		}
	}
	?>


	<div class="btn-group">
		<a href="<?php echo base_url().'index.php/user/view/'.$this->session->userdata("username")?>" class="btn btn-primary">Home</a>
		<a href="<?php echo base_url().'index.php/user/feed/'.$this->session->userdata("username")?>" class="btn btn-primary">Feed</a>
 		<a href="<?php echo base_url().'index.php/message'?>" class="btn btn-primary">Post</a>
 		<a href="<?php echo base_url().'index.php/search'?>" class="btn btn-primary">Search</a>
	</div>
	
	<div class="btn-group">
		<a href="<?php echo base_url().'index.php/user/logout'?>" class="btn btn-primary">Log out</a>
	</div>
		<table>
			<tr>
				<th>User</th>
				<th>Messages</th>
				<th>Posted at</th>
			</tr>
			<?php foreach ($query as $row) {?>
			  <tr>
					<td>
						<a class="text-capitalize" href="<?php echo base_url().'index.php/user/view/'.$row['user_username']?>">
							<?php echo $row['user_username']; ?>
						</a>	
					</td>
					<td><?php echo $row['text']; ?></td>
					<td><?php echo $row['posted_at']; ?></td>
			  </tr>
			<?php } ?>
	
		</table>
	</body>
</html>