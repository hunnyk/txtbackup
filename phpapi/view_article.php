<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$con = mysqli_connect("localhost", "root", "root", "userdb");
$sql = "select * from articletb";
$r = mysqli_query($con, $sql);
$f=0;
echo "[";
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
    //print_r($row);
    if($f==0){
        $f=1;
    }
    else{
        echo ",";
    }
    echo json_encode($row);
}
echo "]";