<?php 
	
    $review_sql = 'SELECT * FROM reviews'; // sets up query
    $review_query = mysqli_query($dbconnect, $review_sql); // runs query
    $review_rs = mysqli_fetch_assoc($review_query); // organises results

?>

<div class="welcomeDiv">
Are you Sure?
</div>
<hr>

<div class="areYouSure">
<a href="admin.php?page=adminHome"><button type="button" class="btn btn-md btn-primary" style="margin-right:10px;">No, go back</button></a>
<a href="admin.php?page=reviewDeleteConfirm&reviewID=<?php echo $_REQUEST['reviewID']; ?>"><button type="button" class="btn btn-md btn-danger">Yes, im sure</button></a>
</div>