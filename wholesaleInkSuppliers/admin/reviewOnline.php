 <?php
    $review_sql = 'SELECT * FROM reviews'; // sets up query
    $review_query = mysqli_query($dbconnect, $review_sql); // runs query
    $review_rs = mysqli_fetch_assoc($review_query); // organises results
    $count=mysqli_num_rows($review_query);
?>
<div class="welcomeDiv">
    <i>Delete Live Reviews</i>
</div>
<hr>

<div class="reviewMain">
		<!--Outside container for the review itself-->
		<div class="reviewContainer">
			<!--Inside container-->
            <?php 
            if($count>=1){
                do{
                    ?>
                        <div class="reviewDiv">
                                <!--Name and image-->
                            <div class="reviewPerson">
                                    <a href="admin.php?page=reviewDelete&reviewID=<?php echo $review_rs['reviewID']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
                                </div>
                                <!--What the reviewer has to say about the company-->
                            <div class="reviewBody">
                                <b><?php echo $review_rs['reviewName'];?></b>: <?php echo $review_rs['review'];?>
                            </div>
                            
                        </div>
                     <hr>
            <?php 
				
}
while ($review_rs=mysqli_fetch_assoc($review_query));
    }
        else {?>    
        <div style="font-size:1.5rem;"><b>No live reviews!</b></div>
        <?php } ?>
           
    </div>
    </div>

