
<?php  
  
  $conn = new mysqli('localhost', 'root','','wordpress');   
  $conn->set_charset("utf8");
    
  $setSql = "SELECT ID,post_title FROM `wp_posts` WHERE post_type='product' AND post_status='publish'";  
  $setRec = mysqli_query($conn, $setSql);  
    
  $columnHeader = '';  
  $columnHeader = "ID" . "\t" . "Name" . "\t";  
    
  $setData = '';  
    
  while ($rec = mysqli_fetch_row($setRec)) {  
      $rowData = '';  
      foreach ($rec as $value) {  
          $value = '"' . $value . '"' . "\t";  
          $rowData .= $value;  
      }  
      $setData .= trim($rowData) . "\n";  
  }  
    
   
  header("Content-type: application/octet-stream");  
  header("Content-Disposition: attachment; filename=User-2.xls");  
  header('Content-Transfer-Encoding: binary');
  header("Pragma: no-cache");  
  header("Expires: 0");  
   
  echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $columnHeader . "\n" . $setData . "\n");
   
  exit();
  
  