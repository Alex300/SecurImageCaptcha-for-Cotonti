<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
Order=10
[END_COT_EXT]
==================== */
/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright 2009-2013 Portal30 http://portal30.ru
 */
defined('COT_CODE') or die('Wrong URL');

require($cfg['plugins_dir']."/captcha/inc/securimage.php");
require_once(cot_langfile('captcha'));

$captca_executed = false;

/**
 * Generates captcha
 * @return string
 * @todo автозаполняемое поле
 */
function captcha_generate(){
    global $cfg, $L, $captca_executed;

    $t = new XTemplate(cot_tplfile('captcha', 'plug'));

    $t->assign(array(
        'CAPTCHA_SRC' => $cfg['plugins_dir']."/captcha/inc/imageshow.php?sid=".md5(uniqid(time())),
    ));

    $t->parse();

    // Captcha Salt
    if(!$captca_executed){
        $tmp = securimageSalt();
        $tmp = "$('input[name=\"rvname\"]').val('{$tmp}')";
        cot_rc_embed_footer($tmp);
        $captca_executed = true;
    }

    return $t->text();
}

function captcha_validate($verify = 0){
    global $cfg, $L;
    // Check anti-hammer
    if(time() - $_SESSION['captcha_time'] > $cfg['plugin']['captcha']['delay']) {
        // Check salt
        $empty = cot_import('rvtown','P','TXT');
        $salt = cot_import('rvname','P','TXT');
        if (empty($empty) && $salt = securimageSalt()){
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
    global $cfg;

    $tmp = $cfg['mainurl'].$cfg['site_id'].$cfg['secret_key'];
    return mb_substr(md5($tmp), 0, 10);

}

$cot_captcha[] = 'captcha';