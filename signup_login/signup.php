<?php

// $servername = "mysql:host=localhost;dbname=signup_login";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=signup_login", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected";





    if (isset($_POST['btn'])) {
        if ($_POST['password'] == $_POST['confirmpassword']) {
            // Variable for from data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];


            $q = $pdo->prepare("INSERT INTO users (name,email,password,gender,dob,phone) VALUES (:name, :email, :password, :gender, :dob,:phone)");
            $q->bindParam("name", $name, PDO::PARAM_STR);
            $q->bindParam("email", $email, PDO::PARAM_STR);
            $q->bindParam("password", $password, PDO::PARAM_STR);
            $q->bindParam("gender", $gender, PDO::PARAM_STR);
            $q->bindParam("dob", $dob, PDO::PARAM_STR);
            $q->bindParam("phone", $phone, PDO::PARAM_STR);
            $q->execute();

            // $emailerror = "User added Successfully";
            $error = '<div style="font-size:1.5rem;" class="alert alert-success text-center" role="alert">Successfully Created Your Account</div>';
        } else {
            // echo "<script> alert('Password Not Match')</script>";
            $error = '<div style="font-size:1.5rem;" class="alert alert-warning text-center" role="alert">Password Not Match! Please Try Again</div>';
        }
    }
} catch (PDOException $e) {
    if (isset($_POST['btn'])) {
        if ($e->errorInfo[1] == 1062) {
            // duplicate entry, do something else
            $error = '<div style="font-size:1.5rem;" class="alert alert-danger text-center" role="alert">Sorry, This Email already Exsist</div>';
        } else {
            // an error other than duplicate entry occurred

            echo "Exception caught: $e";
        }
    }
    // echo $e->getMessage();
}





?>

<!-- HTML CODE START HERE -->
<!doctype html>
<html lang="en">

<head>
    <title>SIGNUP 1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Alert Bar Appear here -->
    <small id="helpId" class="form-text text-muted"><?php
                                                    if (isset($_POST['btn'])) {
                                                        echo $error;
                                                    }
                                                    ?></small>
    <!-- form BEgins here -->
    <h1 class="text-center">
        REGISTER
    </h1>
    <form action="signup.php" method="POST" class="m-auto col-4">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" required>
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <!-- <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div> -->
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" required>
        </div>
        <div class="from-group mb-2">
            <div>
                <label for="">Phone</label>
            </div>
            <div class="input-group-prepend">
                <div class="input-group-text">+</div>
                <input type="tel" name="phone" pattern="[0-9]{12}" class="form-control" id="" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" id="" aria-describedby="helpId" placeholder="" required>
            <small id="helpId" class="form-text text-muted">Password Must Contains:
                <br>
                * Password Must Greater than 8 letters
                <br>
                * An Uppercase Letter
                <br>
                * A Lowercase Letter
                <br>
                * A Special Character
                <br>
                * A Number Digit
            </small>

        </div>

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" name="confirmpassword" id="" aria-describedby="helpId" placeholder="" required>
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="" aria-describedby="helpId" placeholder="" required>
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <select class="form-control" name="gender" id="">
                <option>Male</option>
                <option>Female</option>
                <option>Custom</option>
            </select>
        </div>
        <button type="submit" name="btn" class="w-100 btn btn-info">
            Signup
        </button>
        <p class="text-center py-3">
            Already have an Account! <a href="signin.php">Login</a> Now
        </p>
        <p class="text-center py-1">
            <a href="profile.php"> Search Your Profile </a>
        </p>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>