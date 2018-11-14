<?php
    $search_sql="SELECT * FROM stock WHERE name LIKE '%".$_POST['searchBar']."%' OR description LIKE '%".$_POST['searchBar']."%' OR topline LIKE '%".$_POST['searchBar']."%' ";
    $search_query=mysqli_query($dbconnect, $search_sql);
    $search_rs=mysqli_fetch_assoc($search_query);
    $count=mysqli_num_rows($search_query);
?>

<div class="welcomeDiv">
    <i>Search Results</i>
</div>
<hr>

<div style="display:flex;justify-content:center;align-items:center;">
  <div><form name="search" method="post" action="admin.php?page=stockSearch">
    <input name="searchBar" type="text" value="<?php echo $_POST['searchBar']; ?> " />
    <input name="enter" type="submit" value="Search"/>

</form></div>
</div>


<div class="product">
    <div class="row">
        <?php 
        if($count>=1){
            do{
        ?>

            <div class="showAllOutside"\>
                <b><a href="../index.php?page=item&stockID=<?php echo $search_rs['stockID']; ?>">
                <?php echo $search_rs['name']; ?></a></b>
                &nbsp;
                $<?php echo $search_rs['price']; ?>
                &nbsp;
            <a href="admin.php?page=stockEdit&stockID=<?php echo $search_rs['stockID']; ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                &nbsp;
            <a href="admin.php?page=stockDeleteConfirm&stockID=<?php echo $search_rs['stockID']; ?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
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