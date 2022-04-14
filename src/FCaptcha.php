<?php

class FCaptcha
{
    public function __construct()
    {
        putenv('GDFONTPATH=' . realpath('src'));
    }

    public function generateCaptcha()
    {
        $captcha_char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';

        $captcha_code = substr(str_shuffle($captcha_char), 0, 6);

        $font_size = 25;

        $image_dimensions = [
            'width' => 165,
            'height' => 40
        ];

        $_SESSION['captcha'] = base64_encode($captcha_code);

        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Content-type: image/png");

        $image = imagecreate($image_dimensions['width'], $image_dimensions['height']);

        imagecolorallocate($image, 255, 255, 255);

        $text_color = imagecolorallocate($image, 0, 0, 0);

        imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font', $captcha_code);

        imagepng($image);

        imagedestroy($image);
    }

    public function checkCaptch($value)
    {
        return (base64_decode($_SESSION['captcha']) == $value);
    }
}
