<div class="wrap">
    <h2>تنظیمات</h2>
    <form action="" method="POST">
        <table class="form-table">
            <?php if(!current_user_can('admimistrator')): ?>
            <tr >
                <th scope="row">
                    <label for="epnm_welcome_messag">فعال کردن</label>
                </th>
                <td>
                    فعال|<input type="radio" name="epnm_active_" value="active">
                    غیر فعال<input type="radio" name="epnm_active_" value="deactive">

                </td>
            </tr>
            <?php endif; ?>
            <tr >
                <th scope="row">
                    <label for="epnm_welcome_messag">پیام خوش امد گویی</label>
                </th>
                <td>
                    <textarea name="epnm_message" id="epnm_message" class="widefat" rows="10"></textarea>
                </td>
            </tr>
            <tr >
                <th scope="row">
                    <label for="welcome_message">تنظیمات رنگ</label>
                </th>
                <td>
                    <input type="text" name="welcome_message" id="welcome_message"></input>
                </td>
            </tr>
            <tr >
                <th scope="row">
                    <label for="epnm_welcome_messag">عنوان</label>
                </th>
                <td>
                <?php wp_editor( 'this is content' , 'epnm_title' , array() ); ?>
                </td>
            </tr>
            <tr >
                <th scope="row">
                    <input type="submit" value="ذخیره" id="epnm_submit_title" name="epnm_submit_title"/>
                </th>
            </tr>
        </table>
    </form>
</div>