<?php

require __DIR__ . '/vendor/autoload.php';

use SimpleUserAgent\UserAgent;

$agent = new UserAgent();
$agent->setAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_1_1 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 Mobile/15B150 Safari/604.1');
print_r($agent->getInfo());
