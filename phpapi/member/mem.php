<?php
$con=mysqli_connect('localhost','root','root','userdb');
?>

<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

 header('Content-type: application/json');
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Headers: *');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sql="INSERT INTO members(firstname, lastname) VALUES ('".$request->firstname."','".$request->lastname."')";
	$r=mysqli_query($con,$sql);
	echo json_encode($request);
}


?>