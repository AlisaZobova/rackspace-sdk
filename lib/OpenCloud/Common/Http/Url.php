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

namespace OpenCloud\Common\Http;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Uri;

class Url extends Uri
{
    /**
     * Factory method to create a Url::factory instance
     *
     * @param string $url
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public static function factory(string $url)
    {
        return new self($url);
    }

    /**
     * Add part to existing path
     *
     * @param string $path
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function addPath(string $path)
    {
        $currentPath = $this->getPath();

        if (substr($currentPath, -1) !== '/') {
            // If not, append a forward slash to the end of the path
            $currentPath .= '/';
        }

        return $this->withPath($currentPath.$path);
    }

    /**
     * Add query to existing path
     *
     * @param string $path
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function addQuery(array $query)
    {
        $existingQuery = $this->getQuery() ? $this->getQuery().'&' : '';
        return $this->withQuery($existingQuery. Query::build($query));
    }
}
