<!-- BEGIN: MAIN -->
<table cellpadding="0" cellspacing="0" style="border:none; padding: 0; display: inline-table" >
    <tr>
        <td class="centerall" style="border:none; padding-top: 0; padding-bottom: 0">
            <img src="{CAPTCHA_SRC}" id='verifyimage' align='absmiddle' onclick="this.src='{PHP.cfg.plugins_dir}/captcha/inc/imageshow.php?sid=' + Math.random();">
            <br />
            <span class="desc">{PHP.L.captcha_refresh}</span>ssss
        </td>
        <td style="border: none;  padding: 0" class="centerall">
            <img src="{PHP.cfg.plugins_dir}/captcha/inc/images/refresh.png" align='absmiddle' style="width:19px" />
            <a href="#" onclick="document.getElementById('verifyimage').src='{PHP.cfg.plugins_dir}/captcha/inc/imageshow.php?sid=' + Math.random(); return false">
                <img src="{PHP.cfg.plugins_dir}/captcha/inc/images/refresh.png" align='absmiddle' style="width:19px" />
            </a>
            <input type="text" class="text2 hidden" name="rvtown" value="" />
            <input type="text" class="text2 hidden" name="rvname" value="" />
        </td>
    </tr>
</table>
<!-- END: MAIN -->