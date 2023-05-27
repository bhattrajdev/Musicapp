<?php
session_start();
$connection = mysqli_connect("localhost","root","","phpcore");
$failed="";
$errors=[
    'username' => '',
    'password' =>'',
];
$oldvalues=[
    'username' => ''
];

if(!empty($_POST)){


$username = $_POST['username'];
$password = md5($_POST['password']);


{
  foreach($_POST as $key=>$value)
  {
    if(empty($value)){
        $errors[$key]=ucfirst($key). ' is required'; 
    }
    else{
        $oldvalues[$key] =$value;
    }
  }
  $len = strlen($_POST['username']);
  if(!empty($username)&& $len<3 || $len>25){
  $errors['username']="length not valid (must be between 3 to 25)";
  }


}
if(!array_filter($errors)){
    $query = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($connection,$query);
    if(mysqli_num_rows($res) > 0){
        $userInfo = mysqli_fetch_assoc($res);
        $_SESSION['username'] = $userInfo['username'];
        $_SESSION['is_login'] = true;
        $_SESSION["userid"] = trim($userInfo["id"]);
        header('Location:index.php');
    }
  
    else{
        $failed = " Login Failed Please Try Again";
    }
  
}

}

?>

<!doctype html>
<html lang="en">

<head>
  <title>CHORDS | LOGIN</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background:#335acb;
    }
    .login{
        width: 360px;
        height: min-content;
        padding: 20px;
        border-radius: 12px;
        background: white;
    }
    .login h1{
        font-size: 36px;
        margin-bottom: 25px;
        text-align: center;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }
    .btn{
        width: 100%;
        margin-bottom: 15px;
    }
    label{
        padding-bottom: 10px;
    }
    .forgot{
        color: red;
        text-decoration:none;
        /* text-align: center; */
        text-transform: none;
        
    }

    
</style>
<body>

    <div class="login">
   
        <h1>CHORDS</h1>
        <!-- for failed -->
        <?php if($failed){?>
        <div class="alert alert-danger text-center" role="alert">
        <?= $failed?>
        </div>
        <?php }?>
<!-- for errors -->


        <form method="post" action="">
            <div class="form-group mb-2">
                <label for="username">Username: <a style="color: red;"><?= $errors['username']?></a></label>
                <input type="text" id="username" value="<?=$oldvalues['username']?>" class="form-control" name="username">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password: <a style="color: red;"><?= $errors['password']?></a></label>
                <input type="password" id="password" class="form-control" name="password">
            </div>
             <div class="form-group ">
        <button class="btn btn-success">Login</button>
        <a href="signup.php"class="btn btn-danger">Signup</a>
    </div> 
    </div>
</body>
</html>

