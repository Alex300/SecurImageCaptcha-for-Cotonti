<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.tags
Tags=users.register.tpl:{USERS_REGISTER_VERIFY_IMG},{USERS_REGISTER_VERIFY_INPUT}
[END_COT_EXT]
==================== */

declare(strict_types=1);

/**
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 *
 * @var XTemplate $t
 */
defined('COT_CODE') or die('Wrong URL');

if (Cot::$cfg['captchamain'] === 'captcha') {
    $captchaTags = cot_generateCaptchaTags(null, 'rverify', 'USERS_REGISTER_');
    $t->assign($captchaTags);
}
