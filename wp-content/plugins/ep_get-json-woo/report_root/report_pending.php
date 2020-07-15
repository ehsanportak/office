<?php  
   global $wpdb;
   $db_name = $wpdb->dbname;
   $db_user = $wpdb->dbuser;
   $db_pass = $wpdb->dbpassword;
   $db_host = $wpdb->dbhost;
   $db_prefix = $wpdb->base_prefix;
   $a= $db_prefix . 'posts';
   $b= $db_prefix . 'woocommerce_order_items';

  $conn = new mysqli( $db_host , $db_user , $db_pass , $db_name );   
  $conn->set_charset("utf8");
    
  $setSql = "SELECT $a.ID,$a.post_date, $b.order_item_name FROM $a INNER JOIN $b ON $a.ID= $b.order_id";  
  $setRec = mysqli_query($conn, $setSql);  
    
  $columnHeader = '';  
  $columnHeader = "ID" . "\t"."Date" . "\t" . "Name" . "\t";  
    
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
  header("Content-Disposition: attachment; filename=report_pending.xls");  
  header('Content-Transfer-Encoding: binary');
  header("Pragma: no-cache");  
  header("Expires: 0");  
   
  echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $columnHeader . "\n" . $setData . "\n");
   
  exit();
  
  