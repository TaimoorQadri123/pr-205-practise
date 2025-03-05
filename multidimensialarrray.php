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
       <?php   
       $allstudents=[
        ["ali",21,"karachi","ali@gmail.com",123],
        ["aqsa",19,"karachi","aqsa@gmail.com"],
        ["hassan",21,"karachi","hassan@gmail.com",4556]
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
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>


                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($allstudents as $key => $student){

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
       
    </body>
</html>
