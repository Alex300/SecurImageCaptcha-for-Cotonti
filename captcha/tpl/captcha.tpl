<!-- BEGIN: MAIN -->
<table style="border: none; padding: 0; display: inline-table">
    <tr>
        <td class="centerall" style="border:none; padding-top: 0; padding-bottom: 0">
            <img src="{CAPTCHA_SRC}" id='secur-image-{CAPTCHA_ID}' data-id="{CAPTCHA_ID}" class="secur-image-refresh" />
            <br />
            <span class="desc">{PHP.L.captcha_refresh}</span>
        </td>
        <td class="centerall" style="border: none;  padding: 0 5px;">
            <img
                    src="{PHP.cfg.plugins_dir}/captcha/inc/images/audio_icon.png"
                    class="secur-image-play-sound"
                    style="width: 19px; cursor: pointer"
                    data-id="{CAPTCHA_ID}"
            /><br>
            <img
                    src="{PHP.cfg.plugins_dir}/captcha/inc/images/refresh.png"
                    class="secur-image-refresh"
                    style="width: 19px; cursor: pointer"
                    data-id="{CAPTCHA_ID}"
            />
            <input type="hidden" name="secur-image-id" value="{CAPTCHA_ID}" />
            <input type="text" class="text2 hidden" name="rvtown" value="" autocomplete="off" />
            <input type="text" class="text2 hidden" name="rvname" value="" autocomplete="off" />
        </td>
    </tr>
</table>
<!-- END: MAIN -->