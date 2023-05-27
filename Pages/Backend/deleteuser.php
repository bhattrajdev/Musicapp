<?php

$connection = mysqli_connect("localhost","root","","phpcore");
$id = $_GET['id'];
$query = "DELETE FROM tbl_users WHERE id=$id";
$res = mysqli_query($connection, $query);
if($res){
header('Location:users.php');
}
  

?>
