<!DOCTYPE html>
<?php
  require_once('config.php');
?>
<head>
  <title>Student Page </title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
  
<?php
  
  $sql = "SELECT * FROM `modules`";
  
  $result = mysqli_query($conn, $sql);
  
  if($result) {
    echo '<div class="container"><div class="row">';
    while($row=mysqli_fetch_array($result)) {  
      echo '<div class="offset-md-1 col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">' .$row["course"]. '</h5>
            <p class="card-text"><b>Module :</b> '.$row["module"].'</p>
            <p class="card-text"><b>Module :</b> '.$row["topic"].'</p>
            <a href="#" class="btn btn-success">View</a>
          </div>
        </div>
      </div>';
    }
   
  ?>


<?php

      
    } else {
        echo 'no result';
    }
    echo '</div><br><br><a href="index.html"><button style="float:right" class="btn btn-primary" value="name">Home</button></a></div>';
?>


</body>
</html>