<?php
$student = [

    "id"=>1,
    "name"=>"ali",
    "email"=>"ali@gmail.com"
];
echo $student['name'] . " ". $student['email'];
?>
<h1>for each loop </h1>
<ul>
    <?php
    foreach($student as $key => $value){
    ?>
    <li><?php echo $key . " " . $value?></li>
    <?php
    }
    ?>
</ul>
<h1>nested</h1>

<?php
$students = [
    
    ["id"=>1,"name"=>"ali","email"=>"ali@gmail.com"],
    ["id"=>1,"name"=>"hassan","email"=>"hassan@gmail.com"],
    ["id"=>1,"name"=>"aqsa","email"=>"aqsa@gmail.com"]

];
$allstudents = [
    "std1527"=>["name"=>"ali","email"=>"ali@gmail.com"],
    "std1527"=>["name"=>"hassan","email"=>"hassan@gmail.com"],
    "std1527"=>["name"=>"aqsa","email"=>"aqsa@gmail.com"],

];
?>