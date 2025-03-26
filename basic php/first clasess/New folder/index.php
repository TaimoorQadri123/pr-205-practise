<?php 
$StdName= "Taimoor Qadri";
$StdId = 1527428;
echo $StdId ." " , $StdName;
?>

<?php
$color = "red";
$empName = "Ali";
?>
<h1 style="color:<?php echo $color?>"><?php  echo $empName ?></h1>
<?php
$num1 = 21 ;
$num2 = 22 ;
$mul = $num1*$num2;
$add = $num1+$num2 ;
$sub = $num1-$num2 ;
$div = $num1/$num2 ; 
echo "multipliaction result " . $mul . "<br>" ;
echo "addition result " . $add . "<br>" ;
echo "Subraction result " . $sub . "<br>";
echo "division result " . $div ;


?>