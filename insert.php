<?php 
include('connection.php');
$depa = $_POST['depa'];
$name = $_POST['name'];
$idpp = $_POST['idpp'];
$pid = $_POST['pid'];
$ename = $_POST['ename'];
$padd = $_POST['padd'];
$disp = $_POST['disp'];
$date = $_POST['date'];
$x=0;



$queryxy = "SELECT * FROM table01 WHERE pid='$pid'";
$resultxy= mysqli_query($con,$queryxy);
if (mysqli_num_rows($resultxy))
            {
                   $x=5;
                

                
            }

        else
                    {
                $x=$x;
                    }
if($x==0)
    
{
$query = "INSERT INTO table01 (depa, name, idpp, pid, ename, padd, disp, date) VALUES ('$depa', '$name', '$idpp', '$pid', '$ename', '$padd', '$disp', '$date')";
$result= mysqli_query($con,$query);

$queryf = "INSERT INTO table04 (idpp, pid, padd, date) VALUES ('$idpp', '$pid', '$padd', '$date')";
$resultf= mysqli_query($con,$queryf);
    
$querye = "INSERT INTO table05 (name, pid, padd, disp, date) VALUES ('$name', '$pid', '$padd', '$disp', '$date')";
$resulte= mysqli_query($con,$querye);
    
    
$queryx = "SELECT * FROM table01 WHERE pid='$pid'";
$resultx= mysqli_query($con,$queryx);
if (mysqli_num_rows($resultx))
{
    echo 1;
}

else
{
    echo 0;
}
}
else
{
    
    echo $x;
}




?>
