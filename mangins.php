<?php 
include('connection.php');
$depaid = $_POST['depaid'];
$depa = $_POST['depa'];

$x=0;

$queryy = "SELECT * FROM table02 WHERE depaid='$depaid'";
$resulty= mysqli_query($con,$queryy);

        if (mysqli_num_rows($resulty))
            {
                   $x=5;
                

                
            }

        else
                    {
                $x=$x;
                    }
if($x==0){
$query = "INSERT INTO table02 (depaid, depa)
VALUES ('$depaid', '$depa')";
$result= mysqli_query($con,$query);

$queryx = "SELECT * FROM table02 WHERE depaid='$depaid'";
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
else{
echo $x;

}

?>
