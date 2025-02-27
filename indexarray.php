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
        $students = ["Ali","Aqsa","Hamza","Sana"];
        print_r($students);
        ?>
        
         <ul>
            <?php
            for($i=0 ; $i<count($students) ; $i++ ){
                ?>
             <li> <?php echo $students[$i]?> </li>

            <?php
            }
            ?>
        </ul>

        <h1>foreach loop</h1>
        <ul>
            <?php
            foreach($students as $key => $std){
                ?>
             <li> <?php echo $key." ". $std ?> </li>            
            <?php
            }
            ?>
        </ul>


    </div>
      
    </body>
</html>
        