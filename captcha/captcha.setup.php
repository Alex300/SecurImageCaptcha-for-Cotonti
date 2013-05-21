<?php
/* ====================
[BEGIN_COT_EXT]
Code=captcha
Name=SecurImage CAPTCHA
Category=security-authentication
Description=Securimage CAPTCHA. Protects your site from spam bots with image caphtca. Requires JavaScript.
Version=2.0-3.5
Date=2013-04-18
Author=Alex
Copyright=Portal30 Studio http://portal30.ru, Drew Phillips http://www.phpcaptcha.org
Notes=The Securimage is made by Drew Phillips.  http://www.phpcaptcha.org
SQL=
Auth_guests=R
Lock_guests=12345A
Auth_members=R
Lock_members=12345A
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
delay=01:string::3:Anti-hammer delay in seconds
attempts=02:string::0:Max captcha attempts per session (0 for unlimited)
[END_COT_EXT_CONFIG]
==================== */

/**
 * SecurImage CAPTCHA
 * @package security-authentication
 * @author Alex - Studio Portal30
 * @copyright 2009-2013 Portal30 http://portal30.ru
 */



