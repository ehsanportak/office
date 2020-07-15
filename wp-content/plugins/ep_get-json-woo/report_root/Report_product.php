
<?php  
  
  $conn = new mysqli('localhost', 'portalir_usr','mkUJN{2qz(RB','portalir_db');   
  $conn->set_charset("utf8");
    
  $setSql = "SELECT ID,post_title FROM `wp_posts` WHERE post_type='product' AND post_status='publish'";  
  $setRec = mysqli_query($conn, $setSql);  
    
  $columnHeader = '';  
  $columnHeader = "ID" . "\t" . "Name" . "\t";  
    
  $setData = '';  
    $a=1;
  while ($rec = mysqli_fetch_row($setRec)) {
      $rec[5]=$a;
      $rec1= [$rec[0] , $rec[5]];
      $rowData = '';  
      foreach ($rec1 as $value) {
          $value = '"' . $value . '"' . "\t";  
          $rowData .= $value;  
      }  
      $setData .= trim($rowData) . "\n";  
    $a++;
  }  
    
   
  header("Content-type: application/octet-stream");  
  header("Content-Disposition: attachment; filename=report_product.xls");  
  header('Content-Transfer-Encoding: binary');
  header("Pragma: no-cache");  
  header("Expires: 0");  
   
  echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $columnHeader . "\n" . $setData . "\n");
   
  exit();
  
  