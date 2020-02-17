<div class="wrap">
    <h2>فایل دیجیتال</h2>
    <div id="ep_insert_film">
        <form action="#" method="POST">
            <p>
                <label for="ep_filmname">نام فیلم</label>
                <input type="text" class="widefat" id="ep_filmname" name="ep_filmname" />
            </p>
            <p>
                <label for="ep_filmprice">قیمت</label>
                <input type="text" class="widefat" pattern="\d{3,}" id="ep_filmprice" name="ep_filmprice" />
            </p>
            <p>
                <label for="ep_filmurl">آدرس فایل</label>
                <input type="url" class="widefat" id="ep_filmurl" name="ep_filmurl" />
                <input type="button" id="ep_select_url" class="button button-primary" value="انتخاب فایل" />
            </p>
            <input type="hidden" name="ep_file_id" id="ep_file_id" value="0" />
            <div id="ep_status">لطفا صبر کنید</div>
            <input type="submit" value="ذخیره" id="ep_save_link" class="button button-primary">
        </form>
    </div>
    <input type="button" class="button button-primary" id="ep_show_insert_link" value="add">
    <table class="widefat" id="ep_data_table">
        <tdead>
            <tr>
                <th>شناسه</th>
                <th>نام محصول</th>
                <th>قیمت محصول</th>
                <th>آدرس فایل</th>
                <th>لینک دانلود</th>
                <th>زمان ایجاد</th>
                <th>کد کوتاه</th>
                <th>عملیات</th>
            </tr>
        </tdead>
        <tfoot>
            <tr>
                <th>شناسه</th>
                <th>نام محصول</th>
                <th>قیمت محصول</th>
                <th>آدرس فایل</th>
                <th>لینک دانلود</th>
                <th>زمان ایجاد</th>
                <th>کد کوتاه</th>
                <th>عملیات</th>
            </tr>
        </tfoot>
        <tbody>
        <?php ep_get_products(); ?>
        </tbody>
    </table>
</div>