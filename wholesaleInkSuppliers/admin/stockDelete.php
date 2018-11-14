<?php 

	$stock_sql="SELECT stock.* FROM stock  WHERE stock.stockID=".$_REQUEST['stockID'];
	$stock_query=mysqli_query($dbconnect, $stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	
	// Remove image if required
	if ($stock_rs['photo'] != 'noimage.png')
		
	unlink (IMAGE_DIRECTORY."/".$stock_rs['photo']);
	
	// Delete item
	$delstock_sql="DELETE FROM stock WHERE `stockID`=".$_REQUEST['stockID'];
	$delstock_query=mysqli_query($dbconnect, $delstock_sql); 
?>

<div class="welcomeDiv">
    <i>Delete Success</i> 
</div>

<?php 
	include("adminLinks.php");
?>
