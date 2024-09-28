<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.newcomment.tags
Tags=comments.tpl: {COMMENTS_FORM_VERIFY_IMG}, {COMMENTS_FORM_VERIFY_INPUT}
[END_COT_EXT]
==================== */

declare(strict_types = 1);

/**
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 *
 * @var XTemplate $t
 */

defined('COT_CODE') or die('Wrong URL');

if (Cot::$usr['id'] === 0 && Cot::$cfg['captchamain'] === 'captcha') {
    $captchaTags = cot_generateCaptchaTags(null, 'rverify', 'COMMENTS_FORM_');
    $t->assign($captchaTags);
}
