<!doctype html>
<html lang="en">
  <head>
    <title>Installment Program</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
  <div class="container">
    <form action="" method="post">
      
     <div class="form-group">
       <label for="">Name</label>
       <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
     </div>
     <div class="form-group">
       <label for="">Age</label>
       <input type="text" name="age" id="" class="form-control" placeholder="" aria-describedby="helpId">
     </div>
     <div class="form-group">
       <label for="">Salary</label>
       <input type="text" name="salary" id="" class="form-control" placeholder="" aria-describedby="helpId">
     </div>
     <div class="form-group">
       <label for="">Loan Amount</label>
       <select class="form-control" name="loan_amount" id="">
         <option value="">Select</option>
         <option value="200000">200000</option>
         <option value="300000">300000</option>
         <option value="500000">500000</option>
       </select>
     </div>
     <div class="form-group">
       <label for="">Installment Duration</label>
       <select class="form-control" name="duration" id="">
         <option value="">Select</option>
         <option value="2">2 years</option>
         <option value="3">3 years</option>
         <option value="4">4 years</option>
       </select>
     </div>
     <button class="btn btn-info" name="sub">Submit</button>
    </form>
  </div>
  

  </body>
</html>

<?php
if(isset($_POST["sub"])) {
    $username = $_POST["name"];
    $userage = $_POST["age"];
    $usersalary = $_POST["salary"];
    $loan_amount = $_POST["loan_amount"];
    $duration = $_POST["duration"];
    
    // Check if salary is less than 50000
    if($usersalary < 50000) {
        echo "You are not eligible for the loan. Your salary must be greater than 50,000.";
    } else {
        echo "Name: " . $username . "<br>";
        echo "Age: " . $userage . "<br>";
        echo "Salary: " . $usersalary . "<br>";
        
        if($loan_amount && $duration) {
            // Calculate monthly installment
            $monthly_installment = $loan_amount / ($duration * 12); // monthly installment for the given duration
            echo "Loan Amount: " . $loan_amount . "<br>";
            echo "Installment Duration: " . $duration . " years<br>";
            echo "Your monthly installment: " . number_format($monthly_installment, 2) . " per month";
        } else {
            echo "Please select loan amount and duration.";
        }
    }
}
?>
