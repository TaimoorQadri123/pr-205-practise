<?php
$stdName ="Taimoor";
$stdAge = 20;   
$stdGrade = "A";    
$stdNic = "1234567890"; 

echo $stdName ." ". $stdAge ." ". $stdGrade ." ". $stdNic;    

            //Two way of using H1 in php

// echo "<h1>".$stdName."</h1>"
?>

<h1><?php echo $stdName?></h1>
<h1><?php

$num1 = 10;
$num2 = 20;
$num3 = 30;

$add = $num1 + $num2 + $num3;
$mul = $num1 * $num2 * $num3;
$sub = $num1 - $num2 - $num3;
$div = $num1 / $num2 / $num3;

echo "Addition result is = " . $add . "<br>";
echo "Multiplication result is = " . $mul . "<br>";
echo "Subtraction result is = " . $sub . "<br>";
echo "Division result is = " . $div . "<br>";
?></h1>

