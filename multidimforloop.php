<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <div class="container">

<?php 
$allstudents=[
 ["Ali",15,"karachi","ali@gmail.com"],
 ["Taimoor",19,"karachi","taimoor@gmail.com"],
 ["Asad",22,"karachi","asad@gmail.com"]
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
             <th scope="col">Name</th>
             <th scope="col">Age</th>
             <th scope="col">City</th>
             <th scope="col">E-mail</th>

         </tr>
     </thead>
     <tbody>
          
       <?php
       for($i=0; $i<count($allstudents); $i++){
         ?>

          <tr>
             <td><?php echo $allstudents[$i][0] ?></td>
             <td><?php echo $allstudents[$i][1] ?></td>
             <td><?php echo $allstudents[$i][2] ?></td>
             <td><?php echo $allstudents[$i][3] ?></td>
             
         </tr>

         <?php
       }
       ?>
          

        
         
     </tbody>
 </table>
</div>

</div>  
    </body>
</html>
