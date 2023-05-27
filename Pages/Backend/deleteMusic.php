<?php
$connection = mysqli_connect("localhost","root","","phpcore");
$id = $_GET['id'];
$query = "DELETE FROM tbl_song WHERE id=$id";
$res = mysqli_query($connection, $query);
// $path = public_path('uploads/'.$testpreperation->image);
// if(file_exists($path) && is_file($path)){
//     unlink($path);
// }

if ($res)
    header('Location:viewMusic.php');
