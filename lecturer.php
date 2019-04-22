<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div> 
    <?php 
      require('fpdf.php');
      function record() {
          $lecture = $_POST['lecture'];
          $pdf = new FPDF();
          $pdf->AddPage();
          $pdf->SetFont('Arial','',16);
          $pdf->Cell(40,10,$lecture);
          $pdf->output('lecture4.pdf','F');
          
          //alert to denote that the file is saved
          echo '<script language="javascript">';
          echo 'alert("lecture saved as pdf file")';
          echo '</script>';
       }
       if(array_key_exists('submit',$_POST)){
        record();
      }
    ?>
  </div>
  <div>
    <form action="lecturer.php" method="POST">
      <div class="container">
        <div class="row">
          <div class=" offset-md-1 col-md-10">
            <label for="lecture"><b> Speak to the microphone</b></label>
            <textarea class="form-control" rows="15"  name="lecture" id="lecture" ></textarea>
            
             <hr style=" margin-block-start: 0em; margin-block-end: 0.3em;">
                      <p id="status"> </p>
                      <input  type="submit" class="btn btn-primary" name="submit" value="Submit">
                      <input  type="button" class="btn btn-danger" name="stop" value="Stop" onclick="stop_recording()">
         </div>
        </div>
      </div>

        
      </div>
    </div>
  </div>
  </div>
</div>
<script type="text/javascript"> 
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;
    
    document.getElementById('status').innerHTML = 'recording...';

    recognition.onresult = function(event) { 
      for (var i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
          document.getElementById('lecture').value = document.getElementById('lecture').value +''+ event.results[i][0].transcript;
        }
     }
    }
    recognition.start();

   

    function stop_recording() {
      recognition.stop();
      document.getElementById('status').innerHTML = 'stopped recording! Click submit to save the lecture.';
    }
  </script>
</body>
</html>