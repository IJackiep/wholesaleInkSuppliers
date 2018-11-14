<?php 
	
	$stock_sql="SELECT * from stock ORDER BY `stock`.`name` ASC ";
	$stock_query=mysqli_query($dbconnect, $stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	
?>


<div class="welcomeDiv">
    <i>Show All Items</i>
</div>

<hr>
<div style="display:flex;justify-content:center;align-items:center;">
  <div>
    <form name="search" method="post" action="admin.php?page=stockSearch">
    <input name="searchBar" type="text" />
    <input name="enter" type="submit" value="Search"/>

</form>
    </div>
</div>


<div class="product">
    <div class="row">
        <?php 

do{
	?>

            <div class="showAllOutside"\>
                <b><a href="../index.php?page=item&stockID=<?php echo $stock_rs['stockID']; ?>">
                <?php echo $stock_rs['name']; ?></a></b>
                &nbsp;
                $<?php echo $stock_rs['price']; ?>
                &nbsp;
            <a href="admin.php?page=stockEdit&stockID=<?php echo $stock_rs['stockID']; ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                &nbsp;
            <a href="admin.php?page=stockDeleteConfirm&stockID=<?php echo $stock_rs['stockID']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
            </div>


        <?php
	
}
				

while ($stock_rs=mysqli_fetch_assoc($stock_query))

?>
    </div>
</div>
