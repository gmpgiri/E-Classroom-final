<?php 
require_once('config.php');
?>
<html>
  <head>
    <title> Module Details </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <div>
  <?php
    if(isset($_POST['save'])) {
      $course   = $_POST['course'];
      $module   = $_POST['module'];
      $topic = $_POST['topic'];
      

      $sql = "INSERT INTO modules (course, module, topic) VALUES(?,?,?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$course, $module, $topic]);
      if($result) {
        echo 'successfully saved.';
          header('Location: lecturer.php'); 
      } else {
        echo 'There were errors while saving the data';
      }
     
    }
  ?>
  </div>
  <div>
    <form action="moduledetails.php" method="POST">
      <div class="container">
        <div class="row">
          <div class=" offset-md-3 col-md-5">
            <h3>Enter details of the module</h3>
            <hr class="mb-3">
            <label for="course"><b> Course</b></label>
            <select name="course" class="form-control">
              <option> C Programming </option>
              <option> Data Structures </option>
              <option> Operating System </option>
              <option> Computer Architecture </option>
            </select>

            <label for="module"><b>Module ID</b></label>
            <input class="form-control" type="text" name="module" required>

            <label for="topic"><b>Lecture Topic</b></label>
            <input class="form-control" type="topic" name="topic" required>

            <hr class="mb-2">

            <input class="btn btn-primary" type="submit" name="save" value="save" >
          </div>
        </div>
      </div>
    </form>
  </div>
</html>