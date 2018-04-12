<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //If required
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");         
 
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
    exit(0);
}
// Connect to database
$conn = mysqli_connect('localhost','root','root','userdb');
include_once('members.php');
$request_method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
$member = new Members;
switch($request_method)
{
  case 'GET':
    // Retrive Members
    if(!empty($_GET["mem_id"]))
    {
      $user_id=intval($_GET["mem_id"]);
      $user->getMembers($mem_id);
    }
    else
    {
      $user->getMembers();
    }
    break;
  case 'POST':
    // Insert Member
    $user->saveMember($data);
    break;
  case 'PUT':
    $user->updateMember($data);
    break;
  case 'DELETE':
    // Delete Member
    $user->deleteMember($data);
    break;
  default:
    // Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}