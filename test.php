<?php

declare(strict_types=0);

require 'vendor/autoload.php';

use OpenCloud\Rackspace;

$client = new Rackspace(Rackspace::US_IDENTITY_ENDPOINT, array('username'=>'xxx', 'apiKey'=>'yyy'));

$service = $client->objectStoreService(null, 'ORD', 'publicURL');

$container = $service->getContainer('alisa-aycb');

echo $container->getCdn()->getCdnSslUri() ."\n";
