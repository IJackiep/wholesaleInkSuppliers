 <?php
    $review_sql = 'SELECT * FROM reviews'; // sets up query
    $review_query = mysqli_query($dbconnect, $review_sql); // runs query
    $review_rs = mysqli_fetch_assoc($review_query); // organises results

?>


<div class="reviewMain">
		<!--Header-->
		<i>Our Reviews</i>
		<!--Outside container for the review itself-->
		<div class="reviewContainer">
			<!--Inside container-->
            <?php 

do{
	?>
			<div class="reviewDiv">
				<!--Name and image-->
				<div class="reviewPerson">
					<img alt="Clipart image of reviewer" src="images/person-icon.png"><br>
					<?php echo $review_rs['reviewName'];?>
				</div>
				<!--What the reviewer has to say about the company-->
				<div class="reviewBody">
					<?php echo $review_rs['review'];?>
				</div>
			</div>
             <hr>
			<?php
	
}
				

while ($review_rs=mysqli_fetch_assoc($review_query))

?>
           
    </div>
    </div>
<div style="display:flex;justify-content:center;align-items:center;">
  <div><a href="index.php?page=reviewConfirm"><button type="button" class="btn btn-lg btn-primary" style="margin:auto;">Add your own review!</button></a></div>
</div>
