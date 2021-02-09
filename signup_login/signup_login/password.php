<?php

// $servername = "mysql:host=localhost;dbname=signup_login";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=signup_login", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected . <hr>";
} catch (PDOException $e) {
    echo $e->getMessage();
}


if (isset($_POST['btn'])) {
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        $error = "<div>Password is weak</div>";
    } else {
        $error = "";
    }
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

    <?php echo $error;   ?>
    <!-- form BEgins here -->
    <h1 class="text-center">
        REGISTER
    </h1>
    <form action="" method="POST" class="m-auto col-4">

        <div class="form-group">
            <label for="">Password</label>
            <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" required>
        </div>
        <button type="submit" name="btn" class="w-100 btn btn-info">
            Check
        </button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>