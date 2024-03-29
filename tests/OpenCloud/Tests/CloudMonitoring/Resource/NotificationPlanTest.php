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

namespace OpenCloud\Tests\CloudMonitoring\Resource;

use GuzzleHttp\Psr7\Response;
use OpenCloud\Tests\CloudMonitoring\CloudMonitoringTestCase;

class NotificationPlanTest extends CloudMonitoringTestCase
{
    const NP_ID = 'npAAAA';

    public function setupObjects()
    {
        $this->service = $this->getClient()->cloudMonitoringService();
        $this->resource = $this->service->getNotificationPlan();
    }

    public function testNPClass()
    {
        $this->assertInstanceOf(
            'OpenCloud\\CloudMonitoring\\Resource\\NotificationPlan',
            $this->resource
        );
    }

    public function testNPUrl()
    {
        $this->assertEquals(
            'https://monitoring.api.rackspacecloud.com/v1.0/123456/notification_plans',
            (string)$this->resource->getUrl()
        );
    }

    /**
     * @expectedException OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreateFailsWithoutParams()
    {
        $this->resource->create();
    }

    public function testListAll()
    {
        $response = new Response(200, array('Content-Type' => 'application/json'), '{"values":[{"label":"Notification Plan 1","critical_state":["ntAAAA"],"warning_state":["ntCCCCC"],"ok_state":["ntBBBB"]}],"metadata":{"count":1,"limit":50,"marker":null,"next_marker":null,"next_href":null}}');
        $this->addMockSubscriber($response);

        $list = $this->service->getNotificationPlans();

        $this->assertInstanceOf(self::COLLECTION_CLASS, $list);

        $first = $list->first();
        $this->assertInstanceOf('OpenCloud\CloudMonitoring\Resource\NotificationPlan', $first);
        $this->assertObjectHasAttribute('label', $first);
    }

    public function testGet()
    {
        $response = new Response(200, array('Content-Type' => 'application/json'), '{"label":"Notification Plan 1","critical_state":["ntAAAA"],"warning_state":["ntCCCCC"],"ok_state":["ntBBBB"]}');
        $this->addMockSubscriber($response);

        $this->resource->refresh(self::NP_ID);
        $this->assertEquals('Notification Plan 1', $this->resource->getLabel());
    }
}
