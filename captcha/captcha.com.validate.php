<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.send.first
[END_COT_EXT]
==================== */

declare(strict_types=1);

/**
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 */
defined('COT_CODE') or die('Wrong URL');

if (cot::$cfg['captchamain'] === 'captcha' && cot::$usr['id'] === 0) {
	$rverify = cot_import('rverify', 'P', 'TXT');
	if (!cot_captcha_validate($rverify)) {
		cot_error(cot::$L['captcha_verification_failed'], 'rverify');
	}
}
