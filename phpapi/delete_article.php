<?php
$con=mysqli_connect('localhost','root','root','userdb');


header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');

if($_REQUEST['action'] == 'delete') {
	$sql="DELETE FROM articletb WHERE article_id=".$_REQUEST['id'];
	$r=mysqli_query($con,$sql);
	echo json_encode($request->article_id);
}


// switch($_REQUEST['action'])
// {
//   case 'getall':
//     $res=$article->getArticles();
//     echo $res;
//     break;
//   case 'update':
//     $article->saveArticle($data);
//     break;
//   case 'delete':
//     $article->deleteArticle($data);
//     break;
//   default:
//     header("HTTP/1.0 405 Method Not Allowed");
//     break;
// }
