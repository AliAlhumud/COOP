<?php
$uid = $_POST['uid'];
include('connection.php'); ?>
 
<?php 
	
$query = "Select * FROM table04 where idpp='$uid'"; 
$result = mysqli_query($con, $query); 
$ListRoom = array ();

$count = 0;
while($row = mysqli_fetch_assoc($result)){
	$ListRoom[$count] = array( "pid" => $row['pid'], "date" => $row['date'], "padd" => $row['padd']);
        $count++;
}
echo json_encode($ListRoom);