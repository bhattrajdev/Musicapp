<?php 
ob_start();
include_once('Master/header.php');

$connection = mysqli_connect("localhost","root","","phpcore");

if(!empty($_POST)){
    $name = $_POST['name'];
    $singer = $_POST['singer'];
    $song = '';
    if($_FILES['song']['name']){
        $ext = pathinfo($_FILES['song']['name'], PATHINFO_EXTENSION);
        $songName = md5(microtime()).'.'.$ext;
        $tmp_name = $_FILES['song']['tmp_name'];
        if(!move_uploaded_file($tmp_name,'songs/'.$songName)){
          die('file uploaded failed');
      }
      else{
          $song = $songName;
      }  
    } 
    $query= "INSERT INTO tbl_song(name,song,singer) VALUES('$name','$song','$singer')";
    $res = mysqli_query($connection,$query);
  if($res){
    header('Location:viewMusic.php');
    
  }
}






?>

<div class="card" style="color:black;">
<form action="" method="post" enctype="multipart/form-data">
<h2 class="text-center mb-3" style="color: #3158c9;">Add Music</h2>
    <!-- for singer name -->
    <div class="col-md-12 mb-2">
<label for="name" class="form-label">Name: </label>
<input type="text" name="name" id="name" class="form-control">
</div>

<!-- for music -->
<div class="col-md-12 mt-4">
<label for="song" class="form-label">Song: </label>
<input type="file" name="song" id="song" class="form-control-file">
</div>

<!-- for singer name -->
<div class="col-md-12 mt-4">
<label for="singer" class="form-label">Singer Name: </label>
<input type="text" name="singer" id="singer" class="form-control">
</div>

<div class="col-md-12 mt-4 mb-3">
<button class="btn btn-success">Add</button>
</div>


</form>



</div>






<?php 
include_once('Master/footer.php');
?>