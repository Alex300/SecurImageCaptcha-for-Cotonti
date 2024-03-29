<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.tags
Tags=users.register.tpl:{USERS_REGISTER_VERIFY_IMG},{USERS_REGISTER_VERIFY_INPUT}
[END_COT_EXT]
==================== */

/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @author Alex - Lily Software https://lily-software.com (ex. Portal30 Studio)
 *
 * @var XTemplate $t
 */
defined('COT_CODE') or die('Wrong URL');

if (Cot::$cfg['captchamain'] === 'captcha') {
    // After 0.9.25 release
    //$t->assign(cot_generateCaptchaTags(null, 'rverify', 'USERS_REGISTER_'));

    $captcha = cot_captcha_generate();
    $t->assign([
        'USERS_REGISTER_VERIFY_IMG' => $captcha,
        'USERS_REGISTER_VERIFY_INPUT' =>  cot_inputbox('text', 'rverify', '', 'id="rverify" maxlength="20"'),
    ]);

    if (isset(Cot::$cfg['legacyMode']) && Cot::$cfg['legacyMode']) {
        // @deprecated in 0.9.24
        $t->assign([
            'USERS_REGISTER_VERIFYIMG' => $captcha,
            'USERS_REGISTER_VERIFYINPUT' => cot_inputbox('text', 'rverify', '', 'size="10" maxlength="20"'),
        ]);
    }
}
