<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.newcomment.tags
Tags=comments.tpl: {COMMENTS_FORM_VERIFY_IMG}, {COMMENTS_FORM_VERIFY_INPUT}
[END_COT_EXT]
==================== */

/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Lily Software https://lily-software.com (ex. Portal30 Studio)
 *
 * @var XTemplate $t
 */
defined('COT_CODE') or die('Wrong URL');

if (Cot::$usr['id'] === 0 && Cot::$cfg['captchamain'] === 'captcha') {
    // After 0.9.25 release
    //$t->assign(cot_generateCaptchaTags(null, null, 'COMMENTS_FORM_'));

    $captcha = cot_captcha_generate();
    $t->assign([
        'COMMENTS_FORM_VERIFY_IMG' => $captcha,
        'COMMENTS_FORM_VERIFY_INPUT' =>  cot_inputbox('text', 'rverify', '', 'id="rverify" maxlength="20"'),
    ]);

    if (isset(Cot::$cfg['legacyMode']) && Cot::$cfg['legacyMode']) {
        // @deprecated in 0.9.24
        $t->assign([
            'COMMENTS_FORM_VERIFYIMG' => $captcha,
            'COMMENTS_FORM_VERIFY' => cot_inputbox('text', 'rverify', '', 'size="10" maxlength="20"'),
        ]);
    }
}
