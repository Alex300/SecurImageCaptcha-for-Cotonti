<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.add.first
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright 2009-2013 Portal30 http://portal30.ru
 */
defined('COT_CODE') or die('Wrong URL');

if ($cfg['captchamain'] == 'captcha'){
    $rverify = cot_import('rverify', 'P', 'TXT');

    if (!cot_captcha_validate($rverify))
    {
        cot_error($L['captcha_verify_failed'], 'rverify');
    }
}
