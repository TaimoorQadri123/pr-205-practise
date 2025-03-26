<?php
$num = 10 ;

function output() :string{
    $number =20 ;
    global $num ; 
    return  "global variable"." ". $num." "."local scope variable number"." ".$number."<br>";
}
echo output();


function add($n1= 20, $n2= 30): mixed{
    return $n1 + $n2;
}
echo add();

// STATIC SCOPE 
function statiscScope(){
    static $x = 1;
    echo $x ;
    $x++;


}
echo "<br>";
echo statiscScope();
echo "<br>";
echo statiscScope();
echo "<br>";
echo statiscScope();

$empName = "hassan ";
$empAge = "21";
echo "<h1>$empName , $empAge</h1>";
echo '<h1>$empName , $empAge</h1>';
echo '<h1>' . $empName . $empAge. '</h1>';
echo "<h1>" .$empName , $empAge ."</h1>";
echo "yahan se print statement start hy ";

print "<h1>$empName , $empAge</h1>";
print '<h1>$empName </h1>';
// print '<h1>' . $empName . $empAge. '</h1>';
// print "<h1>" .$empName , $empAge ."</h1>";



?>