<?php 
include('connection.php');
$depaid = $_POST['depaid'];
$depa = $_POST['depa'];
$eid = $_POST['eid'];
$ename = $_POST['ename'];

$x=0;

$queryy = "SELECT * FROM table03 WHERE eid='$eid'";
$resulty= mysqli_query($con,$queryy);
        $result= mysqli_query($con,$queryy);
        if (mysqli_num_rows($resulty))
            {
                   $x=5;
                

                
            }

        else
                    {
                $x=$x;
                    }

if($x==0){
$query = "INSERT INTO table03 (depaid, depa, eid, ename)
VALUES ('$depaid', '$depa', '$eid','$ename')";
$result= mysqli_query($con,$query);

$queryx = "SELECT * FROM table03 WHERE eid='$eid'";
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
