<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=photodb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";


    if (isset($_POST['btn'])) {
        // $file = $_FILES['photo'];
        // move_uploaded_file($file['tmp_name'], "uploads/" . $file['name']);

        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $q = "SELECT * FROM "
        // $q->fetch(PDO::FETCH_ASSOC);


        // $sql = "SELECT * FROM `user` WHERE email =:email";
        // $query = $pdo->prepare($sql);
        // $query->bindParam("email", $email, PDO::PARAM_STR);
        // $query->execute();

        // print_r($a);

        $email = $_POST['email'];
        // $sql = "SELECT * FROM users email=:email";

        $sql = "SELECT `id`, `name`, `email`, `photo` FROM `user` WHERE email =:email";

        $q = $pdo->prepare($sql);

        $q->bindParam("email", $email, PDO::PARAM_STR);
        $q->execute();

        $user = $q->fetchAll(PDO::FETCH_ASSOC);
        // print_r($user);
    }
} catch (PDOException $e) {
    echo $e;
}

?>

<!-- HTML CODE beGIN HERE -->
<!doctype html>
<html lang="en">

<head>
    <title>Photo DB</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" required aria-describedby="helpId" placeholder="">
                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
            </div>
            <button type="submit" class="btn btn-danger" name="btn">
                Submit
            </button>
        </form>
    </div>

    <hr>
    <div>
        <?php
        if (isset($_POST['btn'])) {

            foreach ($user as $aa) {

                echo "Name is " . $aa['name'] . "<br>";
                echo "Email is " . $aa['email'] . "<br>";
                echo "Photo is " . $aa['photo'] . "<br>";
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