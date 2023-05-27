<?php
include_once('Master/header.php');

$connection = mysqli_connect("localhost","root","","phpcore");
$query = "SELECT * FROM tbl_users";
$result = mysqli_query($connection,$query);

?>
<div id="password">
       
    </div>


<table class="table ">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Gender</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $key=>$r){ ?>
    <tr>
      <th scope="row"><?= ++$key?></th>
      <td><?= $r['fname'].' '.$r['mname'].' '.$r['lname'] ?></td>
      <td><?= $r['username'] ?></td>
      <td><?= $r['email'] ?></td>
      <!-- <td</td> -->
      <td>
      <a href="view_user.php?id=<?= $r['id'] ?>"class="btn btn-primary">View</a>
      <a href="deleteuser.php?id=<?= $r['id'] ?>" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this item?');" > Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>



<?php 
include_once('Master/footer.php');
?>
