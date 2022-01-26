<?php 
session_start();

$uid = $_POST['uid'];
$pass = md5($_POST['pwd']);

include('connection.php');

$query = "SELECT * FROM user WHERE username='$uid' and password='$pass' ";

$result= mysqli_query($con,$query);
if (mysqli_num_rows($result))
{
    $_SESSION['user'] = 'admin';
    echo 1;
}

else
{
    echo 0;
}

?>
