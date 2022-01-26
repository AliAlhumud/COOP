<?php

$host="sql312.epizy.com";
$user="epiz_26273963";
$pwd="hJlQV20CUm7jqPU";
$db="imgmap";

$con = mysqli_connect($host, $user, $pwd, $db);


if(mysqli_connect_errno($con))
{
	echo mysqli_connect_error();
	echo "failed to connect";
	exit();
}

?>