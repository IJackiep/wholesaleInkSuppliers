
<?php 

$review_sql="SELECT reviewName, review FROM reviews WHERE reviews.reviewID=".$_REQUEST['reviewID'];
$review_query=mysqli_query($dbconnect, $review_sql);
$review_rs=mysqli_fetch_assoc($review_query);

$tempdelete_sql="DELETE FROM reviews WHERE reviews.reviewID=".$_REQUEST['reviewID'];
$tempdelete_query=mysqli_query($dbconnect,$tempdelete_sql);

    

?>
<div class="welcomeDiv">
    <i>Delete Success</i> 
</div>
<?php 
	include("adminLinks.php");
?>