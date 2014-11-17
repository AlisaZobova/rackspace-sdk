<?php
/**
 * Copyright 2012-2014 Rackspace US, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// Prior to running this script, you must setup the following environment variables:
//   * RS_AUTH_URL: your Rackspace authentication URL
//   * RS_USERNAME: your Rackspace username
//   * RS_API_KEY: your Rackspace API key
//   * RS_REGION: the Rackspace Cloud region you want to use

require dirname(__DIR__) . '/../vendor/autoload.php';

use OpenCloud\Rackspace;

$client = new Rackspace(getenv('RS_AUTH_URL'), array(
    'username' => getenv('RS_USERNAME'),
    'apiKey'   => getenv('RS_API_KEY'),
));

$service = $client->loadBalancerService(null, getenv('RS_REGION'));

// Retrieve existing LB
$lb = $service->loadBalancer('{loadBalancerId}');

// Update SSL config
$sslConfig = $lb->SSLTermination();
$sslConfig->update(array(
    'enabled'     => true,
    'securePort'  => 443,
    'privateKey'  => '{privateKey}',  // specify your private key
    'certificate' => '{certificate}', // specify your SSL certificate
));
