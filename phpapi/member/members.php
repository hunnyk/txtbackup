<?php
class Members{
  //Get members
  function getMembers()
  {
    global $conn;
    $query="SELECT * FROM members";
    $response=array();
    $result=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  //Save member
  function saveMember($data){
    global $conn;
    $query="INSERT INTO members (firstname, lastname) VALUES ('".$data->firstname."', '".$data->lastname."')";
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Update member
  function updateMember($data){
    global $conn;
    $query = "UPDATE members SET firstname='".$data->firstname."', lastname='".$data->lastname."' WHERE mem_id=$data->mem_id.";
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
  //Delete member
  function deleteMember($data){
    global $conn;
    $query = "DELETE FROM members WHERE mem_id=".$data->mem_id;
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    //Respond success / error messages
  }
}