<div class="warp">
    <?php
    if(isset($_POST['epnm_'])){
        $epstye=trim($_POST['f_name']);
    }
    ?>
    <h2>تنظیمات</h2>
    <form action="#" class="post">
        <table class="form_table">
            <tr>
                <th scope="row"><label for="f_name">نام</label></th>
                <td>
                    <textarea class="ltr" rows="10" colse="20" name="f_name" ></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="s_name">اسکریپت سفارشی</label></th>
                <td>
                    <textarea rows="10" colse="20" id="s_name" ></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <input type="submit" value="ذخیره" name="epnm_" class="epnm_">
                </th>
            </tr>
        </table>
    </form>
</div>