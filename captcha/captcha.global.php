<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 * @copyright Lily Software https://lily-software.com (ex. Portal30 Studio)
 */
defined('COT_CODE') or die('Wrong URL');

require(cot::$cfg['plugins_dir'] . '/captcha/inc/securimage.php');
require_once(cot_langfile('captcha'));

$captcha_executed = false;

/**
 * Generates captcha
 * @return string
 */
function captcha_generate(): string
{
    static $captchaExecuted = false;

    $t = new XTemplate(cot_tplfile('captcha', 'plug'));

    $captchaId = md5(uniqid(time()));

    $t->assign([
        'CAPTCHA_SRC' => cot::$cfg['plugins_dir'] . '/captcha/inc/imageshow.php?id=' . $captchaId,
        'CAPTCHA_ID' => $captchaId,
    ]);

    $t->parse();

    // Captcha Salt
    if (!$captchaExecuted) {
        $tmp = "new SecurImageCaptcha({pluginsDir: '" . Cot::$cfg['plugins_dir'] . "'}); \n"
            . " document.querySelector('input[name=\"rvname\"]').value = '" . securimageSalt() . "';";
        Resources::linkFileFooter(cot::$cfg['plugins_dir'] . '/captcha/js/captcha.js');
        Resources::embedFooter($tmp);
        $captchaExecuted = true;
    }

    return $t->text();
}

/**
 * @param string $verify
 */
function captcha_validate($verify = ''): bool
{
    // Check anti-hammer
    if ((time() - $_SESSION['captcha_time']) > cot::$cfg['plugin']['captcha']['delay']) {
        // Check salt
        $empty = cot_import('rvtown','P','TXT');
        $salt = cot_import('rvname','P','TXT');
        $captchaId = cot_import('secur-image-id','P','TXT');
        if (empty($empty) && $salt === securimageSalt()) {
            if ($_SESSION['captcha_count'] == 0) {
                $image = new Securimage();
                return (bool) $image->check($verify, $captchaId, true);
            }
        }
    }
    $_SESSION['captcha_count']++;
    return false;
}

function securimageSalt(): string
{
    $tmp = Cot::$cfg['mainurl'] . Cot::$cfg['site_id'] . Cot::$cfg['secret_key'];
    return mb_substr(md5($tmp), 0, 10);
}

$cot_captcha[] = 'captcha';