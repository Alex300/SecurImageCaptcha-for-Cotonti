/**
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 */

class SecurImageCaptcha {

    #pluginsDir = 'plugins'
    #captchas = {};
    #preloaders = {};
    #loading = {};
    #playing = false;
    constructor(options = {}) {
        if (options.pluginsDir !== undefined) {
            this.#pluginsDir = options.pluginsDir;
        }
        this.#init();
    }

    #init() {
        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('secur-image-refresh')) {
                const captchaId = event.target.dataset.id;
                if (this.#loading[captchaId] !== undefined && this.#loading[captchaId]) {
                    return;
                }
                this.#loading[captchaId] = true;

                const captcha = this.#getCaptcha(captchaId);
                if (captcha === null) {
                    return;
                }
                this.#showPreloader(captchaId);
                captcha.src = this.#pluginsDir + '/captcha/inc/imageshow.php?id=' + captchaId + '&sid=' + Math.random();
                return;
            }
            if (event.target.classList.contains('secur-image-play-sound')) {
                if (this.#playing) {
                    return;
                }
                const captchaId = event.target.dataset.id;
                this.#playing = true;
                this.#showPreloader(captchaId);
                let audio = new Audio(
                    this.#pluginsDir + '/captcha/inc/securimage_play.php?id=' + captchaId);
                audio.addEventListener('canplay', () => {
                    this.#hidePreloader(captchaId);
                });
                audio.addEventListener('ended', () => {
                    this.#playing = false;
                });
                audio.play();
            }
        });
    }

    #getCaptcha(captchaId) {
        if (this.#captchas[captchaId] === undefined) {
            this.#captchas[captchaId] = document.getElementById('secur-image-' + captchaId);
            if (this.#captchas[captchaId] !== null) {
                this.#captchas[captchaId].addEventListener('load', () => {
                    this.#hidePreloader(captchaId);
                    this.#loading[captchaId] = false;
                });
            }
        }
        return this.#captchas[captchaId];
    }

    #showPreloader(captchaId) {
        const element = this.#getCaptcha(captchaId);
        element.style.opacity = '.4';
        if (this.#preloaders[captchaId] !== undefined && this.#preloaders[captchaId] !== null) {
            return;
        }

        this.#preloaders[captchaId] = new Image();
        this.#preloaders[captchaId].onload = () => {this.#setPreloaderPosition(captchaId)};
        this.#preloaders[captchaId].src = this.#pluginsDir + '/captcha/inc/images/loading.png';
        this.#preloaders[captchaId].id = 'secur-image-preloader-' + captchaId;
        this.#preloaders[captchaId].classList.add('secur-image-preloader');
        this.#preloaders[captchaId].style.position = 'absolute';
        document.body.append(this.#preloaders[captchaId]);
    }

    #hidePreloader(captchaId)
    {
        const element = this.#getCaptcha(captchaId);
        element.style.transition = 'opacity 2s ease;';
        element.style.opacity = '1';
        if (this.#preloaders[captchaId] !== null) {
            this.#preloaders[captchaId].remove();
            this.#preloaders[captchaId] = null;
        }
        setTimeout(() => {
            element.style.transition = null;
            element.style.opacity = null;
        }, 1000);
    }

    #setPreloaderPosition(captchaId)
    {
        const element = this.#getCaptcha(captchaId);
        const elementPosition = element.getBoundingClientRect();

        const left = Math.round(
            elementPosition.left + window.scrollX + (elementPosition.width / 2)
            - this.#preloaders[captchaId].offsetWidth / 2
        );

        this.#preloaders[captchaId].style.left = left + 'px';

        const top = Math.round(elementPosition.top + window.scrollY + (elementPosition.height / 2)
            - this.#preloaders[captchaId].offsetHeight / 2);
        this.#preloaders[captchaId].style.top = top + 'px';
    }
}