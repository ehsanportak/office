<?php
/*
plugin name:get json woo
*/


function wpdocs_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'dashboard_widget', 'json', 'dashboard_widget_function' );
}
add_action( 'wp_dashboard_setup', 'wpdocs_add_dashboard_widgets' );
 
function dashboard_widget_function( $post, $callback_args ) {

    
?>
    <label>اطلاعات محصول</label>
    <table border="1">  
    <tr>  
        <th>ID</th>  
        <th>Name</th>   
    </tr>  
    <?php  
    
    $conn = new mysqli('localhost', 'root', '');   
    mysqli_select_db($conn, 'wordpress');   
    $conn->set_charset("utf8");
    
    $sql = mysqli_query($conn,"SELECT * FROM `wp_posts` WHERE post_type='product' AND post_status='publish'");  
    
    
    while($data = mysqli_fetch_row($sql)){  
    echo '  
    <tr>  
    <td>'.$data[0].'</td>  
    <td>'.$data[5].'</td>  
    </tr>  
    ';  
    }  
    ?>  
    </table> <a href="../wp-content/plugins/ep_get-json-woo/UserReport_Export.php"> Export To Excel </a>
<?php
}


