<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.send.first
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright Portal30 http://portal30.ru
 */
defined('COT_CODE') or die('Wrong URL');

if (cot::$cfg['captchamain'] == 'captcha' && cot::$usr['id'] == '0'){
	$rverify = cot_import('rverify', 'P', 'TXT');

	if (!cot_captcha_validate($rverify)){
		cot_error(cot::$L['captcha_verification_failed'], 'rverify');
	}
}
