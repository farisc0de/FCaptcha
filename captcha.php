<?php
session_start();

include_once './src/FCaptcha.php';

$captcha = new FCaptcha;

$captcha->generateCaptcha();
