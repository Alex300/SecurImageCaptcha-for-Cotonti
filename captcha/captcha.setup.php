<?php
/* ====================
[BEGIN_COT_EXT]
Code=captcha
Name=SecurImage CAPTCHA
Category=security-authentication
Description=Securimage CAPTCHA. Protects your site from spam bots with image captcha.
Version=2.3-4.0.2
Date=2024-09-28
Author=Drew Phillips, Alexey Kalnov <kalnovalexey@yandex.ru>
Copyright=© 2009-2024 Lily Software https://lily-software.com, Drew Phillips https://github.com/dapphp
Notes=The Securimage is made by Drew Phillips. https://github.com/dapphp/securimage
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
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 * @see https://github.com/dapphp/securimage
 */

