<?php

class abc
{
    function connection()
    {
        $connect = mysqli_connect('localhost','root','','crud');
        return $connect;
    }
    function insert()
    {
        if(isset($_POST['btn']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $address = $_POST['address'];

            $query = "INSERT INTO `user`(`name`, `email`, `phone`, `password`, `address`) VALUES ('$name','$email','$phone','$password','$address')";
            
            mysqli_query($this->connection(),$query);
            if(!$query)
            {
                echo "<script>alert('Error')</script>";
            }
            else
            {
                echo "<script>alert('Done Added Successfully')</script>";
            }
        }
    }

    function select()
    {
        $select = "SELECT `id`, `name`, `email`, `phone`, `password`, `address`, date_format(date,'%m-%d-%y') as da FROM `user`";
        $query = mysqli_query($this->connection(),$select);
        return $query;
    }
    function delete($a)
    {
        $delete = "DELETE FROM `user` WHERE id=$a";
        $query = mysqli_query($this->connection(),$delete);
        header('location:index.php');
        return $query;
    }
}

$object = new abc;

if(isset($_POST['btn']))
{
    $a = $_GET['next'];
    // $object->delete($a);
    

}
