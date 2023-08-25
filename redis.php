
<?php
// Redis configuration

// Redis configuration

// Include composer files
require_once 'vendor/autoload.php';


$redisHost = 'redis-14030.c2.eu-west-1-3.ec2.cloud.redislabs.com';
$redisPort = 14030;
$redisPassword = 'xuvW6m2U0866ZHTx9a0CqB60OEB5oXrK';

// Connect to Redis server
$redis = new Client([
    'scheme' => 'tcp',
    'host' => $redisHost,
    'port' => $redisPort,
    'password' => $redisPassword,
]);
$redis->connect($redisHost, $redisPort);
if (!empty($redisPassword)) {
    $redis->auth($redisPassword);
}
?>
