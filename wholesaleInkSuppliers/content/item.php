<?php 

$stock_sql="SELECT stock.*, category.catName FROM stock JOIN category ON (stock.categoryID=category.categoryID) WHERE stock.stockID=".$_REQUEST['stockID'];
$stock_query=mysqli_query($dbconnect, $stock_sql);
$stock_rs=mysqli_fetch_assoc($stock_query);

?>

<div class="itemInfo">
		<div class="row">
			<!--This is the image of the product, but this gets removed when the page is smaller than 992px which is controlled by the
			@media tag in the CSS-->
			<div class="col-lg-4 col-md-5 col-sm-5 itemImage"><img alt="Photo of the <?php echo $stock_rs['name'];?> Packaging" src=
			"images/<?php echo $stock_rs['photo'];?>">
			</div>

			<!--This is the container for the item title, the price, and the compatible printers. -->
			<div class="col-lg-5 col-md-7 col-sm-7 itemAbout">
				<div class="itemTitle">
					<i><?php echo $stock_rs['topline'];?></i>
				</div>

				<hr style="background-color:#7A7677;">

				<div class="infoPrice">
					<b><?php echo $stock_rs['price'];?></b> with Free Shipping for orders over $100.<br>
					Please email "sales@wholesaleinksuppliers.co.nz" for a quote.
				</div>
				<br>


				<div class="infoPrinters">
					<?php echo $stock_rs['description'];?>
				</div>
			</div>