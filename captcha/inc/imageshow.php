<?php
/**
 * SecurImage CAPTCHA plugin for Cotonti CMF
 *
 * @package SecurImage
 * @copyright (c) Alexey Kalnov, Lily Software https://lily-software.com
 */

// Remove the "//" from the following line for debugging problems
// error_reporting(E_ALL); ini_set('display_errors', 1);

require_once __DIR__ . '/securimage.php';

$fonts = [
    'elephant.ttf',
    'anorexia.ttf',
    'AHGBold.ttf'
];
$font = $fonts[(rand(1, count($fonts)) - 1)];

$bgrs = [
    'bg1.png',
    'bg3.jpg',
    'bg4.jpg',
    //'bg5.jpg',
    'bg6.jpg',
];
$bgr = $bgrs[(rand(1, count($bgrs)) - 1 )];

$options = [];

// set id if supplied to script via HTTP GET
if (!empty($_GET['id'])) {
    $options['captchaId'] = $_GET['id'];
}

$img = new Securimage($options);

// AntiHammer
$_SESSION['captcha_time'] = time();
$_SESSION['captcha_count'] = 0;

// You can customize the image by making changes below, some examples are included - remove the "//" to uncomment

$img->ttf_file        = './' . $font;

//$img->ttf_file        = './Quiff.ttf';
//$img->captcha_type    = Securimage::SI_CAPTCHA_MATHEMATIC; // show a simple math problem instead of text
$img->case_sensitive  = false;                               // true to use case sensitve codes - not recommended

// May be turn it on again?
//$img->image_height    = 70;                                  // height in pixels of the image
//$img->image_width     = intval($img->image_height * M_E);    // a good formula for image size based on the height

$img->perturbation    = .55;                               // 1.0 = high distortion, higher numbers = more distortion
//$img->image_bg_color  = new Securimage_Color("#0099CC");   // image background color
//$img->text_color      = new Securimage_Color("#EAEAEA");   // captcha text color
$img->num_lines       = 4;                                   // how many lines to draw over the image
//$img->line_color      = new Securimage_Color("#0000CC");   // color of lines over the image
//$img->image_type      = SI_IMAGE_JPEG;                     // render as a jpeg image
//$img->signature_color = new Securimage_Color(rand(0, 64),
//                                             rand(64, 128),
//                                             rand(128, 255));  // random signature color

//$img->noise_level = 2;  // The level of noise (random dots) to place on the image, 0-10

if ($font === 'anorexia.ttf'){
    // нет 8-ки
    $img->charset = 'ABCDEFGHKLMNPRSTUVWYZabcdefghklmnprstuvwyz2345679';
    $img->perturbation = .10;
}

// see securimage.php for more options that can be set

// set namespace if supplied to script via HTTP GET
if (!empty($_GET['namespace'])) {
    $img->setNamespace($_GET['namespace']);
}


$img->show(__DIR__ . '/backgrounds/' . $bgr);  // outputs the image and content headers to the browser
