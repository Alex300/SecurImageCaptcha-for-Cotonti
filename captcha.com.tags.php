<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.newcomment.tags
Tags=comments.tpl: {COMMENTS_FORM_VERIFYIMG}, {COMMENTS_FORM_VERIFY}
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright 2009-2013 Portal30 http://portal30.ru
 */
defined('COT_CODE') or die('Wrong URL');

if ($usr['id'] == '0' && $cfg['captchamain'] == 'captcha')
{
	$t->assign(array(
		'COMMENTS_FORM_VERIFYIMG' => cot_captcha_generate(),
		'COMMENTS_FORM_VERIFY' => cot_inputbox('text', 'rverify', '', 'size="10" maxlength="20"'),
	));
}
