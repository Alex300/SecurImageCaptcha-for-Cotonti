<?php
/* ====================
[BEGIN_COT_EXT]
Code=captcha
Name=SecurImage CAPTCHA
Category=security-authentication
Description=SecurImage CAPTCHA. Protects your site from spam bots with image captcha. Requires JavaScript.
Version=2.2-3.6.8
Date=2024-03-27
Author=Alex
Copyright=© 2009-2024 Lily Software https://lily-software.com (ex. Portal30 Studio), Drew Phillips http://www.phpcaptcha.org
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
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 * @copyright 2009-2024 Lily Software https://lily-software.com (ex. Portal30 Studio)
 */
