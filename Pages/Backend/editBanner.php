<?php 
ob_start();
include_once('Master/header.php');

$connection = mysqli_connect("localhost","root","","phpcore");
$id = $_GET['id'];

$query ="SELECT * FROM tbl_banner WHERE id=$id";


$res=mysqli_query($connection,$query);
$banner=mysqli_fetch_assoc($res);




    if(!empty($_POST)){
        $button = $_POST['button'];
        $name = $_POST['name'];
        $link = $_POST['btnlink'];
        $images= '';
        $description = $_POST['description'];
        // if($_FILES['image']['name']){
        //     $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //     $imageName = md5(microtime()).'.'.$ext;
        //     $tmp_name = $_FILES['image']['tmp_name'];
        //     move_uploaded_file($tmp_name,'images/'.$imageName);
        //     $images = $imageName;
        // }
            $sql = "UPDATE tbl_banner SET name='$name',image='$images',description='$description',btntext = '$button',link = '$link' WHERE id = $id";
            
            $result = mysqli_query($connection,$sql);
            if($result){
                header('Location :viewBanner.php');
            }
          }
     
        
    
        
    
           
        
   
?>

<div class="card" style="color:black;">

<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <!-- for name -->
   <div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="<?=$banner['name']?>" id="name" autocomplete="off">
   </div>
    <!-- for image -->
    <div class="form-group">
    <label for="image" class="form-label">Image:-</label><br>
    <img src="./images/<?= $banner['image']?>" width="200px" height="200px">
    <input type="file" name="image" class="form-control"  id="image">
   </div>



<!-- for description -->
<div class="form-group">
    <label for="description" class="form-label">Description:-</label>
   <textarea name="description" id="description" class="form-control" <?=$banner['description']?> required cols="15" rows="5"><?=$banner['description']?> </textarea>
   </div>

       <!-- for button link -->
       <div class="form-group">
      <label for="btnlink" class="form-label">Link:</label>
      <input type="text" class="form-control" id="btnlink" name="btnlink" value="<?=$banner['link']?>">
    </div>

   <div class="d-flex flex-row">
   <!-- for button -->
   <div class="form-group p-2" style="margin-right: 20px;">
    <label for="button" class="form-label">Buttom Name: </label>
    <input type="text" name="button" class="form-control" required id="name" value="<?=$banner['btntext']?>" autocomplete="off">
   </div>
   </div>
<!-- for submit button -->
<button class="btn btn-success mb-2">Update </button>
   </form>
</div>
<?php
include_once('Master/footer.php');
?>
   