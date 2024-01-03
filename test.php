<?php

declare(strict_types=0);

require 'vendor/autoload.php';

use OpenCloud\Rackspace;

$client = new Rackspace(Rackspace::US_IDENTITY_ENDPOINT, array('username'=>'xxx', 'apiKey'=>'yyy'));

$service = $client->objectStoreService(null, 'ORD', 'publicURL');

$container = $service->getContainer('alisa-aycb');

//echo $container->getCdn()->getCdnSslUri() ."\n";
echo $container->getCdn()->getCdnUri() ."\n";

//$file = $container->getObject('test.jpg');

//$file->setContent(fopen('composer.json', 'r+'));
//$file->update();

//echo ($file->getContent());
//
//$container->deleteObject('test.jpg');

//$files = $container->objectList();
//
//foreach ($files as $file) {
//    print_r($file);
//}

//$container->uploadObject('example.txt', fopen('composer.json', 'r+'));


