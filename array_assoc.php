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
    ["id"=>2,"name"=>"hassan","email"=>"hassan@gmail.com"],
    ["id"=>3,"name"=>"aqsa","email"=>"aqsa@gmail.com"]

];


$allstudents = [
    "std1527"=>["name"=>"ali","email"=>"ali@gmail.com"],
    "std1527"=>["name"=>"hassan","email"=>"hassan@gmail.com"],
    "std1527"=>["name"=>"aqsa","email"=>"aqsa@gmail.com"],

];
?>

    <div
        class="table-responsive"
       >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col"></th> -->
                    <!-- <th scope="col"></th> -->


                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($students  as $key => $student){

                    ?>
                 <tr>

                   <?php 
                   foreach($student as $data){
                   ?>
                   <td><?php echo $data?></td>
                   <?php
                   }
                   ?>
                   
                    
                 </tr>
                    <?php
                }
                ?>
              
                <!-- <tr class="">
                    <td scope="row">Item</td>
                    <td>Item</td>
                    <td>Item</td>
                </tr> -->
            </tbody>
        </table>
    </div>


    