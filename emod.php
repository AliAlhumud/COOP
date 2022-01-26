<?php 
include 'connection.php';
$x = 0;
$dataarr = $_POST['checkval'];
$dataarr = json_decode($dataarr);
  
    
    if (is_array($dataarr) || is_object($dataarr))
{
        foreach($dataarr as $deleteid){
        $query = "DELETE FROM table03 WHERE eid='$deleteid'";

                $result= mysqli_query($con,$query);
    
    }
    
        foreach($dataarr as $deleteid){
        $query = "SELECT * FROM table03 WHERE eid='$deleteid'";

                $result= mysqli_query($con,$query);
            if (mysqli_num_rows($result))
            {
                    $x++;
                
            }

            else
                    {
                $x += $x;
                    }
            
    
    }
  
}
else 
{
  echo "Unfortunately, an error occured.";
}


echo $x;





    ?>

