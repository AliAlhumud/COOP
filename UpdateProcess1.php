<?php
$uid = $_POST['uid'];
include('connection.php'); ?>
 
<?php 
	
$query = "Select * FROM table05 where pid='$uid'"; 
$result = mysqli_query($con, $query); 
$ListRoom = array ();

$count = 0;
while($row = mysqli_fetch_assoc($result)){
	$ListRoom[$count] = array( "pid" => $row['pid'], "name" => $row['name'], "padd" => $row['padd'], "disp" => $row['disp'], "date" => $row['date']);
        $count++;
}
echo json_encode($ListRoom);