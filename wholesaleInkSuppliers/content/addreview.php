<?php 

	$tempname =preg_replace('/[^a-zA-Z0-9 ]/', '', ($_POST["tempName"]));
    $tempreview =preg_replace('/[^a-zA-Z0-9 ]/', '', ($_POST["tempReview"]));
	
	// Put new category into database
	$tempname_sql="INSERT INTO tempReview (tempName, tempReview) VALUES ('$tempname', '$tempreview')";
	$tempname_query=mysqli_query($dbconnect,$tempname_sql);
	

    

?>

<div class="welcomeDiv">
    <i>Your review has now been added!</i> 
</div>
<hr>
<div class="aboutUs">
		Your review has now been submitted to our admins and will be denied or approved in 5 working days. <br>
    Thanks for the feedback!
	</div>