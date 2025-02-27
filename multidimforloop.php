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
       $students=[
        ["ali",21,"karachi","ali@gmail.com"],
        ["aqsa",19,"karachi","aqsa@gmail.com"],
        ["hassan",21,"karachi","hassan@gmail.com"]
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

                </tr>
            </thead>
            <tbody>
                <?php 
                for($i=0 ; $i<count($students) ; $i++){

                    ?>
                 <tr>
                    <td><?php echo $i[0]?></td>
                    <td><?php echo $i[1]?></td>
                    <td><?php echo $i[2]?></td>
                    <td><?php echo $i[3]?></td>
                    
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
