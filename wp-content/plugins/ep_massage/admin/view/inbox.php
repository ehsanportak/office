<?php
$get_inbox=$_GET['page']=== 'epnm_inbox' ? true : false;
$epnm_title=$get_inbox ? 'پیام های دریافتی':'پیام های ارسالی';
?>
<div class="wrap">
    <?php echo $epnm_title;?>
    <div class="epnm_sms">
        شما در مجموع ۲۰ پیام دارید که ۱۰ تای آن خوانده نشده
    </div>
    <table class="widefat">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان پیام</th>
                <th><?php echo $get_inbox ? 'فرستنده':'گیرنده';?></th>
                <th><?php echo $get_inbox ? 'تاریخ دریافت':'تاریخ ارسال';?></th>
                <th> نوع پیام</th>
                <th> وضعیت</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ردیف</th>
                <th>عنوان پیام</th>
                <th><?php echo $get_inbox ? 'فرستنده':'گیرنده';?></th>
                <th><?php echo $get_inbox ? 'تاریخ دریافت':'تاریخ ارسال';?></th>
                <th> نوع پیام</th>
                <th> وضعیت</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
                <td>پیام</td>
            </tr>
        </tbody>
    </table>
</div>