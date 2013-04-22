<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.tags
Tags=users.register.tpl:{USERS_REGISTER_VERIFYIMG},{USERS_REGISTER_VERIFYINPUT}
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright 2009-2013 Portal30 http://portal30.ru
 */
defined('COT_CODE') or die('Wrong URL');

if ($cfg['captchamain'] == 'captcha')
{
	$t->assign(array(
		'USERS_REGISTER_VERIFYIMG' => cot_captcha_generate(),
		'USERS_REGISTER_VERIFYINPUT' => cot_inputbox('text', 'rverify', '', 'size="10" maxlength="20"'),
	));
}
