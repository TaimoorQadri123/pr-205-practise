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
        <form action="" method="get">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="uName" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="uEmail" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                
            </div>

            <button name="sub" class="btn btn-info">Submit</button>
            
        </form>
     </div>


    </body>
</html>

<?php
// if(isset($_POST['sub'])){
//     $userName = $_POST['uName'];
//     $userEmail = $_POST['uEmail'];
//     echo "this is user ". $userName ." and his email is ". $userEmail ;
// }
if(isset($_GET['sub'])){
    $userName = $_GET['uName'];
    $userEmail = $_GET['uEmail'];
    echo "this is user ". $userName ." and his email is ". $userEmail ;
}
?>
