<?php 
include('connection.php');
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];




$query = "INSERT INTO table06 (email, name, message)
VALUES ('$email', '$name', '$message')";
$result= mysqli_query($con,$query);

$queryx = "SELECT * FROM table06 WHERE email='$email'";
$resultx= mysqli_query($con,$queryx);


if (mysqli_num_rows($resultx))
{
    echo 1;
}

else
{
    echo 0;
}

?>
