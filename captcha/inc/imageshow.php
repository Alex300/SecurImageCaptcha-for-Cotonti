<?php

/**
 * Project:     Securimage: A PHP class for creating and managing form CAPTCHA images<br />
 * File:        securimage_show.php<br />
 *
 * Copyright (c) 2018, Drew Phillips
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * Any modifications to the library should be indicated clearly in the source code
 * to inform users that the changes are not a part of the original software.<br /><br />
 *
 * If you found this script useful, please take a quick moment to rate it.<br />
 * http://www.hotscripts.com/rate/49400.html  Thanks.
 *
 * @link http://www.phpcaptcha.org Securimage PHP CAPTCHA
 * @link http://www.phpcaptcha.org/latest.zip Download Latest Version
 * @link http://www.phpcaptcha.org/Securimage_Docs/ Online Documentation
 * @copyright 2018 Drew Phillips
 * @author Drew Phillips <drew@drew-phillips.com>
 * @version 3.6.8 (May 2020)
 * @package Securimage
 *
 */

// Remove the "//" from the following line for debugging problems
// error_reporting(E_ALL); ini_set('display_errors', 1);

require_once dirname(__FILE__) . '/securimage.php';

$fonts = array();
$fonts[] = 'elephant.ttf';
$fonts[] = 'anorexia.ttf';
$fonts[] = 'AHGBold.ttf';
$font = $fonts[( rand(1, count($fonts))-1 )];

$bgrs = array();
$bgrs[] = 'bg1.png';
$bgrs[] = 'bg3.jpg';
$bgrs[] = 'bg4.jpg';
//$bgrs[] = 'bg5.jpg';
$bgrs[] = 'bg6.jpg';
$bgr = $bgrs[( rand(1, count($bgrs))-1 )];

$img = new Securimage();

// AntiHammer
$_SESSION['captcha_time'] = time();
$_SESSION['captcha_count'] = 0;

// You can customize the image by making changes below, some examples are included - remove the "//" to uncomment

$img->ttf_file        = "./".$font;

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

if($font == 'anorexia.ttf'){
    // нет 8-ки
    $img->charset        = 'ABCDEFGHKLMNPRSTUVWYZabcdefghklmnprstuvwyz2345679';
    $img->perturbation    = .10;
}

// see securimage.php for more options that can be set

// set namespace if supplied to script via HTTP GET
if (!empty($_GET['namespace'])) $img->setNamespace($_GET['namespace']);


$img->show("./backgrounds/".$bgr);  // outputs the image and content headers to the browser
// alternate use:
// $img->show('/path/to/background_image.jpg');
