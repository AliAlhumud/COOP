<?php include('connection.php'); ?>



<?php 
	
$query = "Select * FROM table02"; 
$result = mysqli_query($con, $query); 
$ListRoom = array ();

$count = 0;
while($row = mysqli_fetch_assoc($result)){
	$ListRoom[$count] = array( "depaid" => $row['depaid'], "depa" => $row['depa']);
        $count++;
}
echo json_encode($ListRoom);