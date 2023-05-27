<?php 
include_once('Master/header.php');

$connection = mysqli_connect("localhost","root","","phpcore");
$sql = "SELECT * FROM tbl_banner ORDER BY id DESC";
$result = mysqli_query($connection,$sql);

?>


<a href="addBanner.php" class="btn btn-success mb-2">ADD NEW</a>
<div class="card" style="color:black;">


<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Btn Text</th>
      <th scope="col">Link</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $key =>$banner){?>
    <tr>
      <th scope="row"><?= ++$key?></th>
      <td><?=$banner['name']?></td>
      <td><img src="./images/<?= $banner['image']?>" width="100px" height="100px"></td>
      <td><?=$banner['description']?></td>
      <td><?=$banner['btntext']?></td>
      <td><?=$banner['link']?></td>
      <td>
        <a href="deleteBanner.php?id=<?= $banner['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">DELETE</a>
        <a href="editBanner.php?id=<?= $banner['id'] ?>" onclick="return confirm('Are you sure you want to edit this item?');" class="btn btn-primary">EDIT</a>
      </td>
    </tr>
 <?php }?>
   
  </tbody>
</table>

</div>



<?php
include_once('Master/footer.php');
?>