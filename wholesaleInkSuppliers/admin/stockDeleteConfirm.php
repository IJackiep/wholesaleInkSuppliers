

<?php 
	/* needed to show item name in confirmation message */
	$delstock_sql="SELECT * FROM stock WHERE `stockID`=".$_REQUEST['stockID'];
	$delstock_query=mysqli_query($dbconnect, $delstock_sql);
	$delstock_rs=mysqli_fetch_assoc($delstock_query); 

?>

<div class="welcomeDiv">
Do you really want to delete <?php echo $delstock_rs['name']; ?> from the database?
</div>
<hr>
<div class="areYouSure">
<a href="admin.php?page=adminHome"><button type="button" class="btn btn-md btn-primary" style="margin-right:10px;">No, go back</button></a>

<a href="admin.php?page=stockDelete&stockID=<?php echo $_REQUEST['stockID']?>"><button type="button" class="btn btn-md btn-danger">Yes, im sure</button></a>
</div>