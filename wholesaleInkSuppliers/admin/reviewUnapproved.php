<?php 
	
	$tempreview_sql="SELECT * from tempReview";
	$tempreview_query=mysqli_query($dbconnect, $tempreview_sql);
	$tempreview_rs=mysqli_fetch_assoc($tempreview_query);
    
    $count=mysqli_num_rows($tempreview_query);
?>


<div class="welcomeDiv">
    <i>Reviews to approve</i>
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
                                  <a href="admin.php?page=reviewTempMove&tempID=<?php echo $tempreview_rs['tempID']; ?>"><button type="button" class="btn btn-sm btn-primary">Approve</button></a>
                                    <a href="admin.php?page=reviewDeleteTemp&tempID=<?php echo $tempreview_rs['tempID']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
                                </div>
                                <!--What the reviewer has to say about the company-->
                            <div class="reviewBody">
                                <b><?php echo $tempreview_rs['tempName'];?></b>: <?php echo $tempreview_rs['tempReview'];?>
                            </div>
                            
                        </div>
                     <hr>
            <?php 
				
}
while ($tempreview_rs=mysqli_fetch_assoc($tempreview_query));
    }
        else {?>
        <div style="font-size:1.5rem;"><b>Lucky! There is no reviews to approve right now. Please come back later</b></div>
        <?php } ?>
           
    </div>
    </div>

