<?php
session_start();

include_once './src/FCaptcha.php';

$c = new FCaptcha;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $c->checkCaptch($_POST['captcha']) ? 'Captcha OK' : 'Captcha Bad';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <img src="captcha.php" alt="">
        </div>
        <div>
            <input type="text" name="captcha" id="">
        </div>
        <div>
            <button type="submit">Check</button>
        </div>
    </form>



</body>

</html>