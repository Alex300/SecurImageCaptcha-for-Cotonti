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

require(cot::$cfg['plugins_dir']."/captcha/inc/securimage.php");
require_once(cot_langfile('captcha'));

$captcha_executed = false;

/**
 * Generates captcha
 * @return string
 * @todo автозаполняемое поле
 */
function captcha_generate(){
    global $captcha_executed;

    $t = new XTemplate(cot_tplfile('captcha', 'plug'));

    $t->assign(array(
        'CAPTCHA_SRC' => cot::$cfg['plugins_dir']."/captcha/inc/imageshow.php?sid=".md5(uniqid(time())),
    ));

    $t->parse();

    // Captcha Salt
    if(!$captcha_executed){
        $tmp = securimageSalt();
        $tmp = "$('input[name=\"rvname\"]').val('{$tmp}')";
        Resources::embedFooter($tmp);
        $captcha_executed = true;
    }

    return $t->text();
}

function captcha_validate($verify = 0){
    // Check anti-hammer
    if(time() - $_SESSION['captcha_time'] > cot::$cfg['plugin']['captcha']['delay']) {
        // Check salt
        $empty = cot_import('rvtown','P','TXT');
        $salt = cot_import('rvname','P','TXT');
        if (empty($empty) && $salt == securimageSalt()){
            if($_SESSION['captcha_count'] == 0){
                $image = new Securimage();
                return (bool) $image->check($verify);
            }
        }
    }
    $_SESSION['captcha_count']++;
    return false;
}

function securimageSalt(){
    $tmp = cot::$cfg['mainurl'].cot::$cfg['site_id'].cot::$cfg['secret_key'];
    return mb_substr(md5($tmp), 0, 10);

}

$cot_captcha[] = 'captcha';