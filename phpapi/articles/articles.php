<?php
class Articles{
  //Get articles
  function getArticles()
  {
    global $conn;
    $query="SELECT * FROM articles";
    $response=array();
    $result=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
      $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  //Save article
  function saveArticle($data){
    global $conn;
    $query="INSERT INTO articletb(title, category) VALUES ('".$data->title."','".$data->category."')";
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    
  }
  //Delete article
  function deleteArticle($data){
    global $conn;
    $query = "DELETE FROM articletb WHERE article_id=".$data->article_id;
    echo $result=mysqli_query($conn, $query);
    header('Content-Type: application/json');
    
  }
}