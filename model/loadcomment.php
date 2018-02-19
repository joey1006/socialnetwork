<?php


$commentsresult = $mysqli->query( "SELECT * FROM comments ORDER BY id DESC");

$comments= array();

while($row = $commentsresult->fetch_assoc()){
  // if(isset($comments[$row["storyid"]]) == false)
  // {
  //   $comments[$row["storyid"]] = array()
  // }

  $comments[$row["photoid"]][] = $row;

}

?>