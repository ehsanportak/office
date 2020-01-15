<div class="wrap">
    <h2>پیام جدید</h2>
    <?php
    if(isset($_POST['epnm_new_massage_sub'])){
        require epnm_includes . 'functions.php';
        $epnm_get_user = email_and_username($_POST['epnm_new_massage_text']);
        echo $epnm_get_user;
        echo get_current_user_id();
    }
    ?>
    <form action="" method="POST">
        <div class="epnm_newmassage">
             برای ارسال پیام میتوانید 
            <span>با شناسه</span>
            یا
            <span>ایمیل</span>
            اقدام کنید            
        </div>
        <p>
            <label for="epnm_new_massage">گیرنده</label>
            <input type="text" id="epnm_new_massage" name="epnm_new_massage_text"></input><br><br>
        </p>
        <p>
            <label for="epnm_new_massage_sub">موضوع</label>
            <input type="text" id="epnm_new_massage_sub" name="epnm_new_massage_sub"></input><br><br>
        </p>
        <p>
            <label for="epnm_new_massage_text">متن</label>
            <textarea required name="epnm_new_massage_text" rows="5"></textarea>
        </p>
        <p>
            <input type="submit" value="ارسال" name="epnm_new_massage_sub" id="epnm_new_massage_sub" class="">
        </p>
    </form>
</div>