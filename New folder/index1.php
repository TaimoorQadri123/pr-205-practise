<?php
$stdName ="Salman";
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


<?php
$stdName = "ali";
$stdAge = 21  ;
$nic = true ;
echo $stdName . " " . $stdAge  ;
echo "<h1>".$stdName."</h1>"; 
?>

<h1><?php echo $stdName?></h1>

<?php
$color = "red";
$empName = "Hassan";
?>
<h1 style="color:<?php echo $color?>"><?php  echo $empName ?></h1>
<?php
$num1 = 21 ;
$num2 = 22 ;
$mul = $num1*$num2;
$add = $num1+$num2 ;
echo "multipliaction result " . $mul . "<br>" ;
echo "addition result " . $add ;
?>