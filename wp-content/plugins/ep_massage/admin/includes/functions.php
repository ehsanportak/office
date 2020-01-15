<?php
function email_and_username($emailusername){
    if(is_email($emailusername)){
        return email_exists($emailusername);
    }else{
        if($user=get_user_by('login' , $emailusername)){
            return $user->ID;
        }
    }
    return false;
}
?>