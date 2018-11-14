<?php 

$name="";
$price=0;
$categoryID=1;
$topline="";
$description="";
$photo="noimage.png";
$NameErr=$PriceErr=$PhotoErr=$TopErr=$DesErr="";

// sql to populate our 'edit' form...
$stockID=preg_replace('/[^0-9.]/','',$_REQUEST['stockID']);
$editstock_sql="SELECT * FROM stock WHERE stockID=".$stockID;
$editstock_query=mysqli_query($dbconnect, $editstock_sql);
$editstock_rs=mysqli_fetch_assoc($editstock_query);

$name=$editstock_rs['name'];
$price=$editstock_rs['price'];
$categoryID=$editstock_rs['categoryID'];
$topline=$editstock_rs['topline'];
$description=$editstock_rs['description'];
$photo=$editstock_rs['photo'];

// define variables and set to empty values...
$valid=true;
$uploadOk = 1;

// Code below excutes when the form is submitted...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// sanitise all variables
	$name = test_input(mysqli_real_escape_string($dbconnect,$_POST['name']));
	$price= test_input($_POST["price"]);
	$categoryID=preg_replace('/[^0-9.]/','',$_POST['categoryID']);
	$topline= test_input(mysqli_real_escape_string($dbconnect,$_POST['topline']));
	$description= test_input(mysqli_real_escape_string($dbconnect,$_POST['description']));
	
	// Error checking...
	if (empty($name)) {
	$NameErr = "Item name is required";
	$valid=false;
	} 
	
	$price=preg_replace('/[^0-9.]-/','',$_POST['price']);
	if ($price<=0) {
	$PriceErr = "Enter a number greater than 0";
	$valid=false;
	} 
	
	if (empty($topline)) {
	$TopErr = "Please provide a byline ";
	$valid=false;
	} 
	
	if (empty($description)) {
	$DesErr = "Please provide a description";
	$valid=false;
	} 
	
	// Check Image...
	if ($_FILES['fileToUpload']['name']!="") { 
	
	// Shifts images from temporary directory to target directory
	
	// use unique-id so each uploaded file is unique
	$target_file = uniqid()."-". basename($_FILES["fileToUpload"]['name']);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Allow .jpg, .png or gif only
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
	$PhotoErr= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
	$valid=false;
	}
	
		// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	$PhotoErr= "Sorry, your file is too large.";
	$uploadOk = 0;
	$valid=false;
	}
	
	}
	
	// If everything is OK - show 'success message and update databse
	if($valid){
	header('Location: admin.php?page=stockEditSuccess'); 
	
	// Replace image and delete 'old' image if necessary
	
	if ($_FILES['fileToUpload']['name']!="")
	{
	$target_file = uniqid()."-". basename($_FILES["fileToUpload"]['name']);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$changephoto=",photo=\"$target_file\"";

	// Removes old photo file...
	if ($editstock_rs['photo']!='noimage.png' and $editstock_rs['photo']!='')
	{
		unlink(IMAGE_DIRECTORY."/".$editstock_rs['photo']);
	}
	
	$fileuploaded=1;
	
	}
	
	else {
		$fileuploaded=0;
		$changephoto='';		
	}

	// Update the database Column_Name=New_Value, Column_Name=New_Value
	
	$editstock_sql="UPDATE stock SET 
	name='$name',
	categoryID='$categoryID',
	price='$price',
	photo='$photo',
	topline='$topline',
	description='$description'
	$changephoto
	WHERE stockID=$stockID";
	
		
	// Code below runs query and inputs data into database
	$editstock_query=mysqli_query($dbconnect,$editstock_sql);
	
	if ($uploadOk==1) {

		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], IMAGE_DIRECTORY.'/'.$target_file);

		}
		
	}
		
}

?>

<div class="welcomeDiv">
    <i>Item Edit</i> 
</div>
<hr>
<div class="formContainer">
<div class="formBox">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=stockEdit&stockID=$stockID");?>" enctype="multipart/form-data">
	
	<p>
		Item Name:
		<input type="text" name="name" value="<?php echo $name; ?>" class="formInput"/>
		&nbsp;&nbsp; <span class="error" style="color:red;"><?php echo $NameErr;?></span>
	</p>
	
	<p>
		Price: $
		<input type="text" name="price" value="<?php echo $price; ?>" class="formInput"/>
		&nbsp;&nbsp; <span class="error" style="color:red;"><?php echo $PriceErr;?></span>
	</p>
	
	<p>
		Category:
		<select name="categoryID" class="formInput">
		
		<?php 
		
		$cat_sql="SELECT * FROM category";
		$cat_query=mysqli_query($dbconnect,$cat_sql);
				
		do {
			
			if ($cat_rs['categoryID']==$categoryID) {
				echo '<option value="'.$cat_rs['categoryID'].'" selected';
			echo ">".$cat_rs['catName']."</option>";
			}
			else{
			echo '<option value="'.$cat_rs['categoryID'].'"';
			echo ">".$cat_rs['catName']."</option>";
			}
		}
		while ($cat_rs=mysqli_fetch_assoc($cat_query))
		
		?>
		
		</select>
	
	</p>
	
	<p>
		Photo:
		<p>
			<?php 
		// shows image in database
		echo "<img src=".IMAGE_DIRECTORY."/".$editstock_rs['photo']." style=\"width:100px;\">";
		?>
		</p>
		<p>Optionally Replace Photo Above:
		<input type="file" name="fileToUpload" id="fileToUpload" value="" class="formInput"/>&nbsp;&nbsp;<span class="error" style="color:red;"><?php echo $PhotoErr;?></span>
	</p>
	<p>
		Topline:
		<input type="text" name="topline" value="<?php echo $topline; ?>" class="formInput"/>
		&nbsp;&nbsp;<span class="error" style="color:red;"><?php echo $TopErr;?></span>
	</p>
	
	<p>
		Description:&nbsp;&nbsp;<span class="error" style="color:red;"><?php echo $DesErr;?></span>
	</p>
	<p>
		<textarea type="text" name="description" cols="60" rows="7" style="font-size:1rem;" ><?php echo $description; ?></textarea>
	</p>
	
	<input type="submit" name="submit" value="Edit Item" class="formInput"/>

</form>
    
    </div>
    
    </div>