<?php
session_start();
if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged'] == 'admin') {
        header('location:admin.php');
    } elseif ($_SESSION['logged'] == 'manager') {
        echo $_SESSION['logged'];
    } elseif ($_SESSION['logged'] == 'customer') {
        header('location:customer.php');
    }
    echo '<a href="logout.php">logout</a>';
} else {
    header('location:index.php?error=Please Login First');
}
