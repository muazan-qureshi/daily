<?php

// $servername = "mysql:host=localhost;dbname=signup_login";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=signup_login", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected . <hr>";





    if (isset($_POST['btn'])) {

        // Variable for from data

        $email = $_POST['email'];

        $q = $pdo->prepare("INSERT INTO email (mail) VALUES (:email)");
        $q->bindParam("email", $email, PDO::PARAM_STR);

        $q->execute();
        echo 'added!';
        // $q->errorInfo();
        // print_r($this->pdo->errorInfo());
        // echo 'Error occurred:' . implode(":", $this->pdo->errorInfo());
    }
} catch (PDOException $e) {
    // echo $e->getMessage();
    if ($e->errorInfo[1] == 1062) {
        // duplicate entry, do something else
        $emailerror = 'this user has already been added';
    } else {
        // an error other than duplicate entry occurred
        echo "Exception caught: $e";
    }
}



// try {
//     if (isset($_POST['btn'])) {
//         $pdo = new PDO("mysql:host=localhost;dbname=signup_login", 'root', '');
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         $query = "INSERT INTO `email`(`mail`) VALUES (:email)";
//         $statement = $pdo->prepare($query);
//         $statement->execute(array(
//             ':email' => $_POST['email']
//         ));

//         echo 'added!';
//     }
// } catch (PDOException $e) {
//     if ($e->errorInfo[1] == 1062) {
//         // duplicate entry, do something else
//         $emailerror = 'this user has already been added';
//     } else {
//         // an error other than duplicate entry occurred
//         echo "Exception caught: $e";
//     }
// }

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
        REGISTER
    </h1>
    <form action="email.php" method="POST" class="m-auto col-4">

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" required>
            <small id="helpId" class="form-text text-muted"><?php
                                                            if (isset($_POST['btn'])) {
                                                                echo $emailerror;
                                                            }
                                                            ?></small>
        </div>
        <button type="submit" name="btn" class="w-100 btn btn-info">
            Signup
        </button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>