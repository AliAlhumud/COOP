<?php 
include 'connection.php';
$x = 0;
$dataarr = $_POST['checkval'];
$dataarr = json_decode($dataarr);

        foreach($dataarr as $deleteid)
        {
        $query = "SELECT * FROM table03 WHERE depaid='$deleteid'";

        $result= mysqli_query($con,$query);
        if (mysqli_num_rows($result))
            {
                   $x++;
                

                
            }

        else
                    {
                $x=$x;
                    }
            
    
    }



     if($x == 0){
        
        foreach($dataarr as $deleteid){
        $query = "DELETE FROM table02 WHERE depaid='$deleteid'";

                $result= mysqli_query($con,$query);
    
    }
    
        foreach($dataarr as $deleteid){
        $query = "SELECT * FROM table02 WHERE depaid='$deleteid'";

                $result= mysqli_query($con,$query);
            if (mysqli_num_rows($result))
            {
                    $x += $x;
                
            }

            else
                    {
                $x += $x;
                    }
            
    
    }
  
}

    
    
    echo $x;

    ?>

