<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once 'config.php';
require_once 'redis.php';
require_once 'encryption.php';

// Check if link ID is provided
if (isset($_GET['id'])) {
    $linkId = $_GET['id'];

    // Check if link exists in Redis
    if ($redis->exists($linkId)) {
        // Get the encrypted text from Redis
        $encryptedText = $redis->get($linkId);

        // Check if password is required
        if (isset($_POST['password'])) {
            $password = $_POST['password'];

            // Decrypt the text using the provided password
            $decryptedText = decryptText($encryptedText, $password);

            if ($decryptedText !== false) {
                echo "<br><br>";
                echo "<div>";
                echo "<h2>Decrypted Text</h2>";
                echo "<textarea id='message' readonly>$decryptedText</textarea>";
                echo "<br>";
                echo "<button class='button' onclick='window.location.href=\"index.php\"'>Burn</button>";
                echo "</div>";
                $redis->del($linkId);
            } else {
                echo "<h2>Invalid password</h2>";
            }
        } else {
            echo "<br><br>";
            echo "<div>";
            echo "<h2>Enter the password to open</h2>";
            echo "<form method='POST' action='open_link.php?id=$linkId'>";
            echo "<input type='password' name='password'>";
            echo "<input type='submit' value='Submit'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<br><br>";
        echo "<div>";
        echo "Invalid link ID";
        echo "</div>";
    }
} else {
    echo "<br><br>";
    echo "<div>";
    echo "No link ID provided";
    echo "</div>";
}
?>
