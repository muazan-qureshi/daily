<?php



if (isset($_POST['btn'], $_POST['name'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];


    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $dob = $password = $confirmpassword = "";

   
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
    <!-- form BEgins here -->
    <h1 class="text-center">
        REGISITER
    </h1>
    <form action="12.php" method="POST" class="m-auto col-4">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-danger"><?php if (isset($_POST['name'])) {
                                                                   if (empty($name)) {
                                                                    $nameErr = "Name Required";
                                                                }
                                                                   echo $nameErr;
                                                                }  ?></small>
        </div>
        <!-- <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div> -->
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->

        </div>

        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="" aria-describedby="helpId" placeholder="">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="" aria-describedby="helpId" placeholder="">
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
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>