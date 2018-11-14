
<!DOCTYPE HTML>

<?php

session_start();
include("config.php");
include("functions.php");

// Connect to database...
$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_errno()) {
	echo "Connection failed:".mysqli_connect_error();
	exit;
}

?>

<?php
    include ("content/headers.html");
?>


<body>
    
<?php 

    include ("theme/heading.php");
    include ("content/navigation.html");
    
?>
    
<?php
            if(!isset($_REQUEST['page'])){
                include("content/home.php");
            }
            else{
                $page=preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']);
                include("content/$page.php");
            }
        
    
?>

</body>



<?php include ("theme/bottombit.php"); ?>
</body>

</html>
