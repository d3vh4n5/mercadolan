<?php 

include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config/config.php');

const GOOGLE_VALIDATE_URL = 'https://www.google.com/recaptcha/api/siteverify';

function validateCaptcha($token) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = GOOGLE_VALIDATE_URL."?secret=".CAPTCHA_SECRET_KEY."&response=$token&remoteip=$ip";

    $resp = file_get_contents($url);
    $json = json_decode($resp, true);
    $ok = $json['success'];

    if($ok === false) {
        echo "<div class='error'>
            <p>
                Error, CAPTCHA inválido.
            </p>
            <button name='back' onclick='history.back()' action='back'>OK</button>
        </div>";
        return false;
    } else {
        return true;
    }
}

?>