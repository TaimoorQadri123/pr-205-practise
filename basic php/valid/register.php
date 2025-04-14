<?php
include("query.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .error-message { color: red; font-weight: bold; }
        .success-message { color: green; font-weight: bold; }
    </style>
  </head>
  <body>
    <div class="container p-5">
      <form id="registrationForm" action="" method="post">
        <div class="form-group">
          <label for="uName">Name</label>
          <input type="text" name="uName" id="uName" value="<?php echo $userName?>" class="form-control" placeholder="Enter your name">
          <small id="nameError" class="error-message"><?php echo $userNameErr ?></small>
        </div>
        <div class="form-group">
          <label for="uEmail">Email</label>
          <input type="text" name="uEmail" id="uEmail" value="<?php echo $userEmail?>" class="form-control" placeholder="Enter your email">
          <small id="emailError" class="error-message"><?php echo $userEmailErr ?></small>
        </div>
        <div class="form-group">
          <label for="uPassword">Password</label>
          <input type="password" name="uPassword" id="uPassword" value="<?php echo $userPassword?>" class="form-control" placeholder="Enter your password">
          <small id="passwordError" class="error-message"><?php echo $userPasswordErr ?></small>
        </div>
        <div class="form-group">
          <label for="uConfirmPassword">Confirm Password</label>
          <input type="password" name="uConfirmPassword" id="uConfirmPassword" value="<?php echo $userConfirmPassword?>" class="form-control" placeholder="Confirm your password">
          <small id="confirmPasswordError" class="error-message"><?php echo $userConfirmPasswordErr ?></small>
        </div>
        <button name="registerUser" class="btn btn-info" type="submit">Register</button>
      </form>
    </div>

    <script>
      document.getElementById("registrationForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        let isValid = true;

        // Clear previous error messages
        document.getElementById("nameError").textContent = "";
        document.getElementById("emailError").textContent = "";
        document.getElementById("passwordError").textContent = "";
        document.getElementById("confirmPasswordError").textContent = "";

        // Validate Name
        let name = document.getElementById("uName").value;
        let nameRegex = /^[A-Za-z\s]{3,14}$/;
        if (!nameRegex.test(name)) {
          document.getElementById("nameError").textContent = "Name should be between 3 to 14 characters.";
          isValid = false;
        }

        // Validate Email
        let email = document.getElementById("uEmail").value;
        let emailRegex = /^[\w]{1,}[@][a-z]{5,9}[.][a-z]{3}$/;
        if (!emailRegex.test(email)) {
          document.getElementById("emailError").textContent = "Please enter a valid email address (e.g., a1@gmail.com).";
          isValid = false;
        }

        // Validate Password
        let password = document.getElementById("uPassword").value;
        let passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&])[A-Za-z\d!@#$%&]{8,14}$/;
        if (!passwordRegex.test(password)) {
          document.getElementById("passwordError").textContent = "Password must be between 8 and 14 characters, including one uppercase, one lowercase, one digit, and one special character.";
          isValid = false;
        }

        // Validate Confirm Password
        let confirmPassword = document.getElementById("uConfirmPassword").value;
        if (confirmPassword !== password) {
          document.getElementById("confirmPasswordError").textContent = "Password and Confirm Password do not match.";
          isValid = false;
        }

        if (isValid) {
          document.getElementById("registrationForm").submit(); // If validation passes, submit the form
        }
      });
    </script>

  </body>
</html>
