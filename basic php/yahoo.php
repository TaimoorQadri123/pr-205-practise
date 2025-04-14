<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <form action="" method= "post">
          <div class="form-group">
            <label for="">Enter Email</label>
            <input type="text" name="userEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
          </div>
          <button class="btn btn-outline-primary" name="sub">submit</button>
     </form>
    </div>
  
  </body>
  <?php

//   if(isset($_POST['sub'])){
//     $userEmail = $_POST["userEmail"];
//     $restrictedDomain = "yahoo.com";
//     $userEmailArray = explode("@",$userEmail);
//     // print_r($userEmailArray);
//     $userindexlastvalue = $userEmailArray[count($userEmailArray)-1];
//     echo $userindexlastvalue ;
//     $final = strcmp($userindexlastvalue,$restrictedDomain);

//     if($final == 0){
//         echo "<h1>" . "restricted domain" . $userindexlastvalue ."</h1>";
//     }
//     else{
//         echo "<h1>" . "allow domain" . $userindexlastvalue ."</h1>";

//     }
//   }
  ?>
</html>
<?php

  if(isset($_POST['sub'])){
    $userEmail = $_POST["userEmail"];
    $restrictedDomain = "yahoo.com";
    $userEmailArray = explode("@",$userEmail);
    // print_r($userEmailArray);
    $userindexlastvalue = $userEmailArray[count($userEmailArray)-1];
    echo $userindexlastvalue ;
    $final = strcmp($userindexlastvalue,$restrictedDomain);

    if($final == 0){
        echo "<h1>" . "restricted domain" . $userindexlastvalue ."</h1>";
    }
    else{
        echo "<h1>" . "allow domain" . $userindexlastvalue ."</h1>";

    }
  }
  ?>

div>h3>i*5.


