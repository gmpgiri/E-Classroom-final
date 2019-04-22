<!DOCTYPE html>
<?php
  require_once('config.php');
?>
<head>
  <title>Login </title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php
  
  if(isset($_POST['login'])) {
    $userid   = $_POST['userid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE userid='".$userid."' and password ='".$password."'";
  
    $result = mysqli_query($conn, $sql);
    if($result) {
      while($row=mysqli_fetch_array($result)) {
        echo '<script type="text/javascript">
        alert("You are successfully logged in as '.$row['usertype'].'");</script>';
        
        if($row['usertype']=="student") {
          ?>
          <script type ="text/javascript">
          window.location.href ="student.php"</script>
          <?php
  
        } else {
            ?>
            <script type ="text/javascript">
          window.location.href ="moduledetails.php"</script>
          <?php
        }
      }
      
    } else {
        echo ' no result';
      }
    
  }

?>
<div class="container-fluid">
  <div class="row">
    <div class="offset-md-4 col-md-4">
      <h2>Login</h2>
      <hr>

      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" name="userid">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password">
        </div>

        
        <div>
          <input  type="submit" class="btn btn-primary" name="login" value = "Login">
          <div style="float:right">
          <label for="register" ><b>New user? </b></label>
              
              <a href="registration.php"><input class="btn btn-primary" value = "Register" class="form-control" type="button" name="login" required></a>
          </div>
        </div>  
      </form>
    </div>
  </div>
</div>

</body>
</html>