<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Post</title>
	</head>

	<body>
		<div class="post">
            <?php           
            $postForm = array(
                "id"          => "postForm"
            );
            echo form_open(base_url().'index.php/message/doPost', $postForm);
            
            $postTextbox = array(
                'id'          => 'textbox',
                'name'        => 'postText',
                'placeholder' => 'Write anything you want',
                'rows'        => '10',
                'cols'        => '60'
            );
            echo form_textarea($postTextbox);
            
            $postButton = array(
                'class'       => 'btn btn-info',
                'name'        => 'insert',
                'value'       => 'Post'
            );
            echo '<div>'.form_submit($postButton).'</div>';

            echo form_close();
            ?>
        </div>
	</body>
</html>
