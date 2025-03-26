<?php 
// include("php/query.php");
// unset($_SESSION['userEmail']);
// echo "<script>location.assign('index.php')</script>"
?>
<?php 
include("php/query.php");  // Ensure session_start() is included here

unset($_SESSION['adminEmail']); // Admin ka email session unset karna
// Admin ka name bhi remove karna

echo "<script>location.assign('index.php')</script>"

?>
<!-- header("Location: index.php"); // Redirect index.php par
exit;
unset($_SESSION['adminName']);  
session_destroy(); // Poora session destroy karna -->
