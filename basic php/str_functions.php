<?php
$str = "Hello thIs is Ali. he is intelligent , Ali is excellent";
echo strlen($str) . "<br>";
echo str_word_count($str)."<br>";
echo ucwords($str)."<br>";
echo strtolower($str)."<br>";
echo strtoupper($str)."<br>";
echo "<br>";
echo $str."<br>";
echo str_replace("Ali",'Huzaifa',$str)."<br>";
$str2 = "hello this is Ali";
print_r(explode(' ',$str2)) . "<br>";
$url = "https/PR2-202405C/str_fun.php";
// print_r(explode("/",$url));
$urlArry = explode('/',$url); // return arrayArray ( [0] => https [1] => PR2-202405C [2]  =>functions [3] => str_fun.php )
echo $urlArry[count($urlArry)-1]; // [4]
echo "<br>";
$fileName = "index.html";
print_r(explode('.',$fileName));
echo "<br>";
$fileNameArray = explode('.',$fileName) ;
echo $fileNameArray[count($fileNameArray)-1] ."<br>";

$name = "ali khan";
echo strrev($name);

echo "<br>" ;
$empName = "ali";
echo strcmp('ali',$empName,);

?>
