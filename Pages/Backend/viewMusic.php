<?php 
$connection = mysqli_connect("localhost","root","","phpcore");
$sql = "SELECT * FROM tbl_song ORDER BY id DESC";
$result = mysqli_query($connection,$sql);
?>

<a href="addMusic.php" class="btn btn-success mb-2">ADD NEW</a>
<div class="card" style="color:black;">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Song</th>
      <th scope="col">Singer</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $key =>$song){?>
    <tr>
      <th scope="row"><?= ++$key?></th>
      <td><?=$song['name']?></td>
      <td><audio controls><source src="./songs/<?= $song['song']?>" type="audio/ogg"></audio></td>
       <td><?=$song['singer']?></td>
      <td>
        <a href="deleteMusic.php?id=<?= $song['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">DELETE</a>
        <a href="editMusic.php?id=<?= $song['id'] ?>" onclick="return confirm('Are you sure you want to edit this item?');" class="btn btn-primary">EDIT</a>
      </td>
    </tr>
 <?php }?>
   
  </tbody>
</table>

</div>



<?php
include_once('Master/footer.php');
?>