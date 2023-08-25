<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
// require_once 'config.php';
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

    echo "Your secret sharing link: <a href='$linkUrl'>$linkUrl</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Onetime Secret</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Onetime Secret</h1>
    <form method="POST" action="create_link.php">
        <label for="text">Enter your secret:</label><br>
        <textarea id="text" name="text" rows="4" cols="50" required></textarea><br><br>
        <label for="expiry">Choose link expiry:</label>
        <select id="expiry" name="expiry">
            <option value="300">5 minutes</option>
            <option value="1800">30 minutes</option>
            <option value="3600">1 hour</option>
            <option value="86400">1 day</option>
            <option value="604800">1 week</option>
        </select><br><br>
        <label for="password">Enter password (optional):</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Generate Link">
    </form>
</body>
</html>
