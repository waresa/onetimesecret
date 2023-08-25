<?php
require_once 'config.php';
require_once 'redis.php';
require_once 'encryption.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $expiry = $_POST['expiry'];
    $password = $_POST['password'];

    // Generate a unique link ID
    $linkId = uniqid();

    // Encrypt the text if password is provided
    if (!empty($password)) {
        $encryptedText = encryptText($text, $password);
        $redis->set($linkId, $encryptedText);
    } else {
        $redis->set($linkId, $text);
    }

    // Set the expiry time for the link
    $redis->expire($linkId, $expiry);

    // Generate the link URL
    $linkUrl = $_SERVER['HTTP_HOST'] . '/open_link.php?id=' . $linkId;
    ?>
    <!DOCTYPE html>
        <html>
        <head>
            <title>Secret Sharing Application</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <br><br>
            <div style='text-align: center;'>
                <h2 style='margin: 0 auto;'>Your secret sharing link:</h2>
                <br>
                <a href='<?php echo $linkUrl ?>'><?php echo $linkUrl ?></a><br><br>
                <br>
                <div id='copyFeedback' style='display: none;'></div>
                <button class='button' onclick='copyLink()'>
                    Copy Link
                </button>
                <br><br>
                <button class='button' onclick='goBack()'>
                    Go Back
                </button>
            </div>
        </body>
    <?php
}
?>


