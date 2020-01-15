<div id="epmb_new_tab">
    <ul class="category-tabs epmb_tab">
        <li><a href="#frag1">مشخصات فنی</a></li>
        <li><a href="#frag2">پردازنده</a></li>
        <li><a href="#frag3">گرافیک</a></li>
        <li><a href="#frag4">تصویر</a></li>
        <li><a href="#frag5">نقد فنی</a></li>
    </ul>
    <br class="clear"/>
    <div id="frag1">
        <table class="widefat">
            <tr>
                <td>
                    <label for="epmb_size_information">ابعاد</label>
                    <input type="text" name="epmb_size_information" value="" id="epmb_size_information">
                    <span class="description">۲۹.۲*۲۵۶*۳۸۲ میلی متر</span>
                </td>
                <td>
                    <label for="epmb_vazn_information">وزن</label>
                    <input type="text" name="epmb_vazn_information" value="" id="epmb_vazn_information">
                    <span class="description">۲.۳۹ کیلوگرم</span>
                </td>
            </tr>
        </table>
    </div>
    <div class="hidden" id="frag2">
    <table class="widefat">
            <tr>
                <td>
                    <label for="epmb_cpu_information">سازنده</label>
                   <select name="epmb_cpu_information">
                       <option value="intel">intel</option>
                       <option value="amd">amd</option>
                   </select>
                </td>
                <td>
                    <label for="epmb_core_information">سری</label>
                    <select name="epmb_core_information">
                       <option value="corei3">corei3</option>
                       <option value="corei5">corei5</option>
                       <option value="corei7">corei7</option>
                    </select>
                </td>
                <td>
                    <label for="epmb_cpu_pro">سازنده</label>
                    <input type="text" name="epmb_cpu_pro" value="" id="epmb_cpu_pro">
                    <span class="description">5500u</span>
                </td>
                <td>
                    <label for="epmb_cpu_freq">فرکانس</label>
                    <input type="text" name="epmb_cpu_freq" value="" id="epmb_cpu_freq">
                    <span class="description">2.3 GHz up to 3.00 GHz</span>
                </td>
            </tr>
        </table>
    </div>
    <div class="hidden" id="frag3">
        <table class="widefat">
            <tr>
                <td>
                    <label for="epmb_gpu_information">سازنده</label>
                    <select name="epmb_gpu_information">
                       <option value="nvidia">nvidia</option>
                       <option value="intel">intel</option>
                       <option value="amd">amd</option>
                    </select>
                </td>
                <td>
                    <label for="epmb_gpu_model">مدل</label>
                    <input type="text" name="epmb_gpu_model" value="" id="epmb_gpu_model">
                    <span class="description">Geforce GT 790m</span>
                </td>
            </tr>
        </table>
    </div>
    <div class="hidden" id="frag4">
        <p>
            <input type="text" class="ltr" value="" name="epmb_pic[]">
            <input type="button" value="افزودن تصویر" class="button-secondary epmb_button_pic"/>
        </p>
    </div>
    <div class="hidden" id="frag5">
        <?php wp_editor( 'content' , 'epmb_naghd' );?>
    </div>

</div>