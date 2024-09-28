<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.add.first
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

if (Cot::$cfg['captchamain'] == 'captcha') {
    $rverify = cot_import('rverify', 'P', 'INT');

    if (!cot_captcha_validate($rverify)) {
        cot_error('captcha_verification_failed', 'rverify');
    }
}
