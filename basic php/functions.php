<?php 
$num = 10 ;
function output(){
    $number = 20 ;
    global $num ;
    return "global variable"." ". $num . " " . "local scope variable" ." ".  $number . "<br>";
}
echo output();

function add($n1=20 , $n2=30){
    return $n1 + $n2 ;
}
echo add ();

// STATIC SCOPE 
function staticscope(){
    static $x =1;
    echo $x;
    $x++;
} 
echo "<br>";
echo staticscope();
echo "<br>";
echo staticscope();
echo "<br>";
echo staticscope();

$empName = "Hassan";
$empAge = "21";
echo "<h1>$empName , $empAge </h1>";
echo '<h1>$empName , $empAge </h1>';
echo '<h1>' . $empName . $empAge .'</h1>';
echo  "<h1>" . $empName . $empAge ."</h1>";
// echo "<br";
echo "yahan se print start horaha hy ";

print "<h1>$empName , $empAge </h1>";
print '<h1>$empName , $empAge </h1>';
print '<h1>' . $empName . $empAge .'</h1>';
print "<h1>" . $empName . $empAge ."</h1>";
?>