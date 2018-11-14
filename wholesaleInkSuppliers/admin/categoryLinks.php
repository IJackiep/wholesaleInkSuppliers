<div class="welcomeDiv">
    <i>Category Edit</i> 
</div>

<hr>
<div class="formContainer">
<div class="formBox">
    
<form action="admin.php?page=categoryAdd" method="post" class="formInside">
		Add: <input name="catName" value="" class="formInput"/>
		<input type="submit" value="Add Categoy" class="submitButton col-3"/>
	</form>
	
	<br />
	
	<form action="admin.php?page=categoryEdit" method="post" class="formInside">
		Change: <select name="oldcat" class="formInput">
		
			<option value="" >
				Choose...
			</option>
			
			<?php 
				$cat_sql="SELECT * FROM category";
				$cat_query=mysqli_query($dbconnect,$cat_sql);
				$cat_rs=mysqli_fetch_assoc($cat_query);
				
				do{
				// value sent to query that edits the category
				echo "<option value='";
				echo $cat_rs['catName'];
				echo "'>";
				
				// what the user sees in the drop down menu
				echo $cat_rs['catName'];
				echo "</option>";
				}
				
				while($cat_rs=mysqli_fetch_assoc($cat_query))
			?>
			
		</select>
		&nbsp; to 
        <input name="newcat" value="" class="formInput"/>
		<input type="submit" value="Update Category" class="submitButton col-3"/>
		
	</form>
	
	<br/>
	
	<form action="admin.php?page=categoryDelete" method="post" class="formInside">
	Delete: <select name="delcat" class="formInput">
		
			<option value="" >
				Choose...
			</option>
			
			<?php 
				$delcat_sql="SELECT * FROM category";
				$delcat_query=mysqli_query($dbconnect,$delcat_sql);
				$delcat_rs=mysqli_fetch_assoc($delcat_query);
				
				do{
				// value sent to query that edits the category
				echo "<option value='";
				echo $delcat_rs['categoryID'];
				echo "'>";
				
				// what the user sees in the drop down menu
				echo $delcat_rs['catName'];
				echo "</option>";
				}
				
				while($delcat_rs=mysqli_fetch_assoc($delcat_query))
			?>
			
		</select>
		<input type="submit" value="Delete Category" class="submitButton col-3"/>
	</form>
</div>
    
    </div>
