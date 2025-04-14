<?php 
include("php/query.php");
?>
<h1>Hello this is web page</h1>
<?php 
if(isset($_SESSION['userEmail'])){
?>
   <h1><?php echo $_SESSION['userName'] . " ". $_SESSION['userEmail']  ?></h1>
   <a href="logout.php">logout</a>
   <?php
}else{
?>
<a href="login.php">login</a>
<?php 
}
?>


