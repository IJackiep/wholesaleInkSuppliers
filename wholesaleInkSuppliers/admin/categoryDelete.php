<?php  
	
	$delcatID = preg_replace('/[^0-9]/', '', $_POST["delcat"]);
	
	$delcat_sql="SELECT * FROM category WHERE categoryID=".$delcatID;
	$delcat_query=mysqli_query($dbconnect, $delcat_sql);
	$delcat_rs=mysqli_fetch_assoc($delcat_query);
	
	// check if category has items in it
	$check_sql="SELECT * FROM stock WHERE categoryID=$delcatID";
	$check_query=mysqli_query($dbconnect, $check_sql);
	$count=mysqli_num_rows($check_query);

	?>

<div class="welcomeDiv">
Are you Sure?
</div>
<hr>
<div class="areYouSure">
<a href="admin.php?page=adminHome"><button type="button" class="btn btn-md btn-primary" style="margin-right:10px;">No, go back</button></a>

<a href="admin.php?page=categoryDeleteConfirm&categoryID=<?php echo $delcat_rs['categoryID']?>"><button type="button" class="btn btn-md btn-danger">Yes, im sure</button></a>
</div>