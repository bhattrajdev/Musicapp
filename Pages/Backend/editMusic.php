<?php 
ob_start();
include_once('Master/header.php');

$connection = mysqli_connect("localhost","root","","phpcore");
$id = $_GET['id'];

$query ="SELECT * FROM tbl_song WHERE id=$id";


$res=mysqli_query($connection,$query);
$song=mysqli_fetch_assoc($res);

    if(!empty($_POST)){
        $name = $_POST['name'];
        $singer = $_POST['singer'];
        $song = '';
        if($_FILES['song']['name']){
            $ext = pathinfo($_FILES['song']['name'], PATHINFO_EXTENSION);
            $songName = md5(microtime()).'.'.$ext;
            $tmp_name = $_FILES['song']['tmp_name'];
            if(!move_uploaded_file($tmp_name,'songs/'.$songName))
              die('file uploaded failed');
          else
              $song = $songName;  
        } 
        $sql = "UPDATE tbl_song SET name='$name',song='$song',singer='$singer' WHERE id = $id";
        $res = mysqli_query($connection,$sql);
      if($res){
        header('Location:viewMusic.php');
      }
    }
?>
<h1 class="text-center">Edit Music</h1>
<div class="card" style="color:black;">
<form action="" method="post" enctype="multipart/form-data">
    <!-- for singer name -->
    <div class="col-md-12 mt-2">
<label for="name" class="form-label">Name</label>
<input type="text" name="name" value="<?= $song['name']?>" id="name" class="form-control">
</div>

<!-- for music -->
<div class="col-md-12 mt-2">
<label for="song" class="form-label mt-2">Song</label><br>
<audio controls><source src="./songs/<?= $song['song']?>" type="audio/ogg"></audio>
<input type="file" name="song" id="song" class="form-control-file mt-2">
</div>

<!-- for singer name -->
<div class="col-md-12 mt-3">
<label for="singer" class="form-label">Singer Name</label>
<input type="text" name="singer" id="singer" value="<?= $song['singer']?>" class="form-control">
</div>

<div class="col-md-12 mt-3">
<button class="btn btn-success">Update</button>
</div>


</form>
</div>


<?php
include_once('Master/footer.php');
?>
   