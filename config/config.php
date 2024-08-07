<?php

$base_url = $_SERVER['DOCUMENT_ROOT'];

require_once $base_url.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->safeLoad(); // Este no lanza error si no existe el archivo .env
// $dotenv->load();

// DATABASE VARIABLES 

$db_host = $_ENV['DB_HOST'] ?? 'localhost';
$db_user = $_ENV['DB_USER'] ?? 'root';
$db_pass = $_ENV['DB_PASS'] ?? '';
$db_name = $_ENV['DB_NAME'] ?? 'test';
$db_port = $_ENV['DB_PORT'] ?? 3306;

define("DB_HOST", $db_host);
define("DB_USER", $db_user);
define("DB_PASS", $db_pass);
define("DB_NAME", $db_name);
define("DB_PORT", $db_port);

// MAIL VARIABLES

define("APP_EMAIL", $_ENV['APP_EMAIL']);
define("APP_EMAIL_PASS", $_ENV['APP_EMAIL_PASS']);

// CAPTCHA KEYS

define('CAPTCHA_PUBLIC_KEY', $_ENV['CAPTCHA_PUBLIC_KEY']);
define('CAPTCHA_SECRET_KEY', $_ENV['CAPTCHA_SECRET_KEY']);
