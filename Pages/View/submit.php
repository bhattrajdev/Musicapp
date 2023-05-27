<?php

$connection = mysqli_connect("localhost","root","","phpcore");
$query = "SELECT song_id FROM tbl_recent ORDER BY id DESC LIMIT 1";
$res = mysqli_query($connection,$query);



foreach($res as $r){
if(!empty($_POST) && $r['song_id']!=$_POST['song_id']){
   $song_id = $_POST['song_id'];
   $user_id = $_POST['user_id'];
   $sql = "INSERT INTO tbl_recent (song_id,user_id) VALUES('$song_id','$user_id')";
   $result = mysqli_query($connection,$sql);
      $q = "UPDATE tbl_song SET count= count+1 WHERE id = $song_id"; 
      $r = mysqli_query($connection,$q);
     
      }
  
}
?>

