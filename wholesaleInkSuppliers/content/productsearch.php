<?php
    $search_sql="SELECT * FROM stock WHERE name LIKE '%".$_POST['searchBar']."%' OR description LIKE '%".$_POST['searchBar']."%' OR topline LIKE '%".$_POST['searchBar']."%' ";
    $search_query=mysqli_query($dbconnect, $search_sql);
    $search_rs=mysqli_fetch_assoc($search_query);
    $count=mysqli_num_rows($search_query);

	$stock_sql="SELECT * FROM stock";
	$stock_query=mysqli_query($dbconnect,$stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
?>

<div class="welcomeDiv">
    <i>Search Results</i>
</div>
<hr>

<div style="display:flex;justify-content:center;align-items:center;">
  <div>
        <form name="search" method="post" action="index.php?page=productsearch" class="form-inline">
            <input name="searchBar" type="text" class="form-control mr-sm-2" value="<?php echo $_POST['searchBar']; ?>" />
            <button class="btn btn-dark" name="enter" type="submit">Search</button>
        </form>
    </div>
</div>


<div class="product">
    <div class="row">
        <?php 
        if($count>=1){
            do{
        ?>
        
        <div class="productContainer col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card cardProducts border-secondary">
                <a data-content="<?php echo $search_rs['description'];?>" data-toggle="popover" data-trigger="hover" href="index.php?page=item&stockID=<?php echo $search_rs['stockID'];?>" title="<?php echo $search_rs['topline'];?>">

                    <div class="productImage"><img alt="<?php echo $search_rs['name'];?>" class="card-img-top" src="images/<?php echo $search_rs['photo'];?>">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title text-dark">
                            <?php echo $search_rs['name'];?>
                        </h4>
                    </div>
                </a>
            </div>
        </div>


<?php
	
}
				

while ($search_rs=mysqli_fetch_assoc($search_query));
    }
        else {
        ?>
            <b>Sorry there are no products fitting that description</b>
        <?php 
            } 
        ?>
        
    </div>
</div>