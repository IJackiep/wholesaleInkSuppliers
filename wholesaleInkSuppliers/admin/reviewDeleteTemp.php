<?php 
	
	$tempreview_sql="SELECT * from tempReview";
	$tempreview_query=mysqli_query($dbconnect, $tempreview_sql);
	$tempreview_rs=mysqli_fetch_assoc($tempreview_query);
    
    $count=mysqli_num_rows($tempreview_query);
?>

<div class="welcomeDiv">
Are you Sure?
</div>
<hr>
<div class="areYouSure">
<a href="admin.php?page=adminHome"><button type="button" class="btn btn-md btn-primary" style="margin-right:10px;">No, go back</button></a>

<a href="admin.php?page=reviewDeleteTempConfirm&tempID=<?php echo $_REQUEST['tempID']; ?>"><button type="button" class="btn btn-md btn-danger">Yes, im sure</button></a>
</div>