<!-- BEGIN: MAIN -->
<table cellpadding="0" cellspacing="0" style="border:none; padding: 0; display: inline-table" >
    <tr>
        <td class="centerall" style="border:none;">
            <img src="{CAPTCHA_SRC}" id='verifyimage' align='absmiddle' onclick="this.src='{PHP.cfg.plugins_dir}/captcha/inc/imageshow.php?sid=' + Math.random();">
            <br />
            <span class="desc">{PHP.L.captcha_refresh}</span>
        </td>
        <td style="border: none;  padding: 0" class="centerall">
            <object type="application/x-shockwave-flash" data="{PHP.cfg.plugins_dir}/captcha/inc/securimage_play.swf?audio_file={PHP.cfg.plugins_dir}/captcha/inc/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" width="19" height="19">

                <param name="movie" value="{PHP.cfg.plugins_dir}/captcha/inc/securimage_play.swf?audio_file={PHP.cfg.plugins_dir}/captcha/inc/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />

            </object>

            <br />
            <a href="#" onclick="document.getElementById('verifyimage').src='{PHP.cfg.plugins_dir}/captcha/inc/imageshow.php?sid=' + Math.random(); return false">
                <img src="{PHP.cfg.plugins_dir}/captcha/inc/images/refresh.png" align='absmiddle' style="width:19px" />
            </a>
            <input type="text" class="text2 hidden" name="rvtown" value="" />
            <input type="text" class="text2 hidden" name="rvname" value="" />
        </td>
    </tr>
</table>
<!-- END: MAIN -->