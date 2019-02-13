<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Search</title>
	</head>
	<body>
		<div class="search-container">
            <form class="form-inline" action="<?php echo base_url().'index.php/search/dosearch';?>"  method="GET">

				<!-- Search form -->
				<input class="form-control mx-sm-3" type="text" placeholder="Search..." name="search_term">
                <button class="btn btn-info" type="submit">Search</button>
            </form>		
        </div>
	</body>
</html>
