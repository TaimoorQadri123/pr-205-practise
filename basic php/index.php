<?php 
$stdName = "Taimoor Ali";
$stdage = 18;
$nic = true;
echo $stdName . " ". $stdage ;
echo "<h1>" .$stdName. "</h1>";


?>
<h1> <?php echo $stdName ?></h1>
<?php
$color = "red";
$empName = "hassan";
?>
<h1 style="color:<?php echo $color ?>"><?php echo $empName ?> </h1>
<?php
$num1 = 20 ;
$num2 = 84 ;
$mul =  $num1*$num2;
$add= $num1+$num2;
$sub = $num1-$num2;
$div = $num1/$num2;
// echo "addition result is". $add . ;
// echo "mutiplication result is". $mul .; 
echo "addition result is"." ". $add . "<br>";
echo "subraction result is"." ". $sub . "<br>";
echo "multiplication result is"." ". $mul . "<br>";
echo "division result is"." ". $div . "<br>";
?>