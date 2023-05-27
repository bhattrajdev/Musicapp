<?php 
ob_start();
include_once('Master/header.php');



$connection = mysqli_connect("localhost","root","","phpcore");
if(!empty($_POST)){
   $button = $_POST['button'];
   $btncolor = $_POST['btncolor'];
   $txtcolor = $_POST['txtcolor'];
   $name = $_POST['name'];
   $link = $_POST['btnlink'];
   $images= '';
   $heading = $_POST['heading'];
   $description = $_POST['description'];
   if($_FILES['image']['name']){
       $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
       $imageName = md5(microtime()).'.'.$ext;
       $tmp_name = $_FILES['image']['tmp_name'];
       if(!move_uploaded_file($tmp_name,'images/'.$imageName)){
         die('file uploaded failed');

     }
     else{
         $images = $imageName;
     }   
 
 


   $sql = "INSERT INTO tbl_banner (name,image,description,btntext,link)
VALUES('$name','$images','$description','$button','$link')";
      $result = mysqli_query($connection,$sql);
      header('Location:./viewBanner.php');   
      }
   }



?>

<div class="card" style="color:black;">
<form action="" method="post" enctype="multipart/form-data">
  
    <div class="col-md-12">
       <h2 class="text-center mb-3 text-hr" style="color: #3158c9;">Add Banner</h2>
        <!-- for name -->
   <div class="form-group">
    <label for="name" class="form-label">Name: </label>
    <input type="text" name="name" class="form-control"  id="name" autocomplete="off">
   </div>

    <!-- for image -->
    <div class="form-group">
    <label for="image" class="form-label">Image: </label>
    <input type="file" name="image" class="form-control"  id="image">
   </div>



<!-- for description -->
<div class="form-group">
    <label for="description" class="form-label">Description: </label>
   <textarea name="description" id="description" class="form-control"  cols="15" rows="5"></textarea>
   </div>

       <!-- for button link -->
       <div class="form-group">
      <label for="btnlink" class="form-label">Link:</label>
      <input type="text" class="form-control" id="btnlink" name="btnlink">
    </div>

   <div class="d-flex flex-row">
   <!-- for button -->
   <div class="form-group p-2" style="margin-right: 20px;">
    <label for="button" class="form-label">Buttom Name: </label>
    <input type="text" name="button" class="form-control"  id="name" autocomplete="off">
   </div>
  
  
   </div>



<!-- for submit button -->
<button class="btn btn-success mb-2 mt-2">ADD </button>
   </form>
</div>
<?php
include_once('Master/footer.php');
?>
   