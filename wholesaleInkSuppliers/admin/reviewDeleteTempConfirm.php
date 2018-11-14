
<?php 

$review_sql="SELECT tempName, tempReview FROM tempReview WHERE tempreview.tempID=".$_REQUEST['tempID'];
$review_query=mysqli_query($dbconnect, $review_sql);
$review_rs=mysqli_fetch_assoc($review_query);

$tempdelete_sql="DELETE FROM tempreview WHERE tempreview.tempID=".$_REQUEST['tempID'];
$tempdelete_query=mysqli_query($dbconnect,$tempdelete_sql);

    

?>

<div class="welcomeDiv">
    <i>Delete Success</i> 
</div>
<?php 
	include("adminLinks.php");
?>