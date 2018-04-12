<?php
$con=mysqli_connect('localhost','root','root','userdb');

 header('Content-type: application/json');
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Headers: *');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$sql="SELECT * FROM articletb WHERE article_id=".$_SERVER['QUERY_STRING'];
	$r=mysqli_query($con,$sql);
	$res;
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        //print_r($row);
       $res->article_id=$row['article_id'];
       $res->title=$row['title'];
       $res->category=$row['category'];
    }

	echo json_encode($res);
}

// $postdata = file_get_contents("php://input");
// $request = json_decode($postdata);
// header('Content-type: application/json');
// header("Access-Control-Allow-Origin: *");
// header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
//  if($request!=null) {
// 	$con = mysqli_connect("localhost", "root", "root", "userdb");
//     $sql = "select * from articletb WHERE article_id=" . $request->article_id;
//     $r = mysqli_query($con, $sql);
//     $res;

//     while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//         //print_r($row);
//        $res->article_id=$row['article_id'];
//        $res->title=$row['title'];
//        $res->category=$row['category'];
//     }
//     echo json_encode($res);

// }
