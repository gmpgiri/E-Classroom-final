<?php 
require_once('config.php');
?>
<html>
  <head>
    <title> Registration </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <div>
  <?php
    if(isset($_POST['create'])) {
      $name     = $_POST['name'];
      $userid   = $_POST['userid'];
      $password = $_POST['password'];
      $deptname = $_POST['deptname'];
      //to get value of radio button
      if(isset($_POST['usertype'])) {
        $usertype = $_POST['usertype'];
      } else {
        echo 'select a user type';
      }

      $sql = "INSERT INTO users (name, userid, password, deptname, usertype) VALUES(?,?,?,?,?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$name, $userid, $password, $deptname, $usertype]);
       if($result) {
        header('Location: login.php'); 
      } else { 
        
      }
     
    }
  ?>
  </div>
  <div>
    <form action="registration.php" method="POST">
      <div class="container">
        <div class="row">
          <div class=" offset-md-3 col-md-5">
            <h1>Registration</h1>
            <hr class="mb-3">
            <label for="name"><b> Name</b></label>
            <input class="form-control" type="text" name="name" required>

            <label for="userid"><b>User ID</b></label>
            <input class="form-control" type="text" name="userid" required>

            <label for="password"><b>Password</b></label>
            <input class="form-control" type="password" name="password" required>

            <label for="deptname"><b>Department Name</b></label>
            <input class="form-control" type="text" name="deptname" required>

            <div class="radio">
              <label><input type="radio" name="usertype" value="student"> Student</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="usertype" value="lecturer"> Lecturer</label>
            </div>
            <div>
              <input class="btn btn-primary" type="submit" name="create" value="Register" >
              <div style="float:right">
                <label for="login"><b>Already a user? Login here</b></label>
                
                <a href="login.php"><input class="btn btn-primary" value = "Login" class="form-control" type="button" name="login" required></a>
              </div>
          </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</html>