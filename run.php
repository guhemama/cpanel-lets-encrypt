<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!defined("PHP_VERSION_ID") || PHP_VERSION_ID < 50300 || !extension_loaded('openssl') || !extension_loaded('curl')) {
    die("You need at least PHP 5.3.0 with OpenSSL and curl extension\n");
}

require 'Lescript.php';

$certificatesDir = './certs';

$le = new Analogic\ACME\Lescript($certificatesDir);
$le->initAccount();

$domainWebroots = [
    'example.com'     => '/home/username/www'
  , 'www.example.com' => '/home/username/www'
  , 'example.org'     => '/home/username/example.org'
  , 'www.example.org' => '/home/username/example.org'
];

$le->setDomainWebroots($domainWebroots);
$le->signDomains(array_keys($domainWebroots));