<br>
<label>سفارشات در انتظار پرداخت</label>
    <table border="1">  
    <tr>  
        <th>ID</th>  
        <th>date</th>
        <th>name</th>
    </tr>  
    <?php  
 global $wpdb;
 $db_name = $wpdb->dbname;
 $db_user = $wpdb->dbuser;
 $db_pass = $wpdb->dbpassword;
 $db_host = $wpdb->dbhost;
 $db_prefix = $wpdb->base_prefix;
 $a= $db_prefix . 'posts';
 $b= $db_prefix . 'woocommerce_order_items';
 
 $conn = new mysqli($db_host , $db_user , $db_pass);   
     mysqli_select_db($conn, $db_name);   
     $conn->set_charset("utf8");
    
    $sql = mysqli_query($conn,"SELECT * FROM $a INNER JOIN $b ON $a.ID= $b.order_id");
    while($data = mysqli_fetch_row($sql)){  
    echo '  
    <tr>  
    <td>'.$data[0].'</td>  
    <td>'.$data[2].'</td>
    <td>'.$data[24].'</td>

    </tr>  
    ';  
    }  
    ?>  
    </table> <a href="../wp-content/plugins/ep_get-json-woo/report_root/report_pending.php"> Export To Excel </a>
