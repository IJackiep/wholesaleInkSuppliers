
<?php 

$review_sql="SELECT tempName, tempReview FROM tempReview WHERE tempreview.tempID=".$_REQUEST['tempID'];
$review_query=mysqli_query($dbconnect, $review_sql);
$review_rs=mysqli_fetch_assoc($review_query);


$tempName = $review_rs['tempName'];
$tempReview = $review_rs['tempReview'];
	// Put new category into database
	$tempreview_sql="INSERT INTO reviews (reviewName, review) VALUES ('$tempName', '$tempReview')";
	$tempreview_query=mysqli_query($dbconnect,$tempreview_sql);
$tempdelete_sql="DELETE FROM tempreview WHERE tempreview.tempID=".$_REQUEST['tempID'];
$tempdelete_query=mysqli_query($dbconnect,$tempdelete_sql);

    

?>
<div class="welcomeDiv">
    <i>Add Success</i> 
</div>
<?php 
	include("adminLinks.php");
?>