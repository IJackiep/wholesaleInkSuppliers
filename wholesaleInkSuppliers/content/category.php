<?php

	if(!isset($_REQUEST['categoryID']))
	{
		header('Location:index.php');		
	}

	$stock_sql="SELECT stock.stockID, stock.name, stock.price, stock.photo, stock.description, category.catName FROM stock JOIN category ON (stock.categoryID=category.categoryID) WHERE stock.categoryID=".$_REQUEST['categoryID']." ORDER BY stock.name ASC";
	$stock_query=mysqli_query($dbconnect,$stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	
?>

<div class="welcomeDiv">
    <i>Compatable
        <?php echo $stock_rs['catName'];?> Ink Cartridges</i>
</div>




<div class="product">
    <div class="row">
        <?php 

do{
	?>

        <div class="productContainer col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card cardProducts border-secondary">
                <a data-content="<?php echo $stock_rs['description'];?>" data-toggle="popover" data-trigger="hover" href="index.php?page=item&stockID=<?php echo $stock_rs['stockID'];?>" title="<?php echo $stock_rs['catName'];?> Compatible Inkjet <?php echo $stock_rs['name'];?> ">

                    <div class="productImage"><img alt="<?php echo $stock_rs['name'];?>" class="card-img-top" src="images/<?php echo $stock_rs['photo'];?>">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title text-dark">
                            <?php echo $stock_rs['name'];?>
                        </h4>
                    </div>
                </a>
            </div>
        </div>


        <?php
	
}
				

while ($stock_rs=mysqli_fetch_assoc($stock_query))

?>
    </div>
</div>

