# SecurImage Captcha plugin for Cotonti

![Снимок экрана 2024-09-29 085826](https://github.com/user-attachments/assets/3c3fbf59-e17d-4047-8df1-52e30aa9ed5d)

Securimage CAPTCHA plugin for Cotonti CMF. Protects your site from spam bots with image captcha.

Uses the [Securimage class](https://github.com/dapphp/securimage) (from [Drew Phillips](https://github.com/dapphp))

Authors: 
 - Securimage [Drew Phillips](https://github.com/dapphp)
 - Cotonti plugin: [Alexey Kalnov](https://www.cotonti.com/users/Alex300) (https://github.com/Alex300)

Cotonti CMF: https://www.cotonti.com/

Plugin pages:
- https://lily-software.com/free-scripts/cotonti-securImage-captcha
- Cotonti todo

## Opportunities:

- You can use this captcha wherever it is used on your site: in the registration form, comments, feedback, etc.
- The image can be updated without reloading the page
- Those who cannot read the code can listen to the voice code

A sample of the captcha's work can be viewed, for example, in the [registration form of this site](https://lily-software.com/users?m=register).

## Installation:

- copy the captcha folder from the archive to the plugins folder on your hosting
- install the plugin in the ite admin panel
- in the site admin panel, under **Configuration** -> **Security** -> **Captcha**, select default "Captcha"

To change the image settings (font, size, background image, noises, etc.), edit the file /inc/imageshow.php 

## Using captchas in your plugins:

Similar to using any other captcha (todo link to documentation).
