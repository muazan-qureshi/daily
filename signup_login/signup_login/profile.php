<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=signup_login", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected";





    if (isset($_POST['btn'])) {

        // Variable for from data
        // $name = $_POST['name'];
        $email = $_POST['email'];
        // $password = $_POST['password'];
        // $confirmpassword = $_POST['confirmpassword'];
        // $gender = $_POST['gender'];
        // $dob = $_POST['dob'];



        // $sql = "SELECT * FROM users email=:email";

        $sql = "SELECT `id`, `name`, `email`, `password`, `gender`, `dob` FROM `users` WHERE email =:email";

        $q = $pdo->prepare($sql);

        $q->bindParam("email", $email, PDO::PARAM_STR);
        $q->execute();

        $user = $q->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


?>

<!-- HTML CODE START HERE -->
<!doctype html>
<html lang="en">

<head>
    <title>Search Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center py-3">
        Search Your Profile
    </h1>
    <form action="" class="form col-6 m-auto" method="POST">
        <div class="form-group">
            <label for="">Search Your Profile</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter Your Email">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>
        <button class="btn btn-info" type="submit" name="btn">
            Search
        </button>
    </form>

    <div class="col-lg-6 m-auto py-3">
        <?php
        if (isset($_POST['btn'])) {
            foreach ($user as $people) {
                echo "Name: " . $people['name'] . "<br>";
                echo "Email: " . $people['email'] . "<br>";
                echo "Date of Birth: " . $people['dob'] . "<br>";
                echo "Gender: " . $people['gender'] . "<br>";
            }
        }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>