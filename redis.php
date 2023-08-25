
<?php
// Redis configuration

// Redis configuration

// Include composer files
require_once 'vendor/autoload.php';

use Predis\Client;

// Connect to Redis server
$redis = new Client([
    'scheme' => 'tcp',
    'host' => 'redis-14030.c2.eu-west-1-3.ec2.cloud.redislabs.com',
    'port' => 14030,
    'password' => 'xuvW6m2U0866ZHTx9a0CqB60OEB5oXrK',
]);
$redis->connect($redisHost, $redisPort);
if (!empty($redisPassword)) {
    $redis->auth($redisPassword);
}
?>
