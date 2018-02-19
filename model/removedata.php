
<?php

$files = glob("photos/"."*");
  $now   = time();


  foreach ($files as $file) {
  	// echo "<br>". filemtime($file);
    if (is_file($file)) {
    $dt=$now - filemtime($file);
    // echo " dt=".$dt.">".(60);
      if ($dt >=  60 * 60) { 
        
        unlink($file);

      }

    }
  }

  // echo "<br><br>" . date("Y-m-d-H-i-s") . "  huidige tijd in sec.";
  

$sql = "DELETE FROM photos WHERE uploadtime<=DATE_SUB(NOW(), INTERVAL 60 MINUTE)"; 
$result = $mysqli->query($sql);
?>