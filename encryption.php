<?php
require_once 'config.php';

function encryptText($text, $password) {
    $method = 'aes-256-cbc';
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16); // Generate a 16-byte IV
    $encrypted = openssl_encrypt($text, $method, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

function decryptText($encryptedText, $password) {
    $method = 'aes-256-cbc';
    $key = hash('sha256', $password, true);
    $encryptedText = base64_decode($encryptedText);
    $iv = substr($encryptedText, 0, 16); // Extract the first 16 bytes as the IV
    $encrypted = substr($encryptedText, 16);
    return openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);
}
?>