Image tags
==========

Setup
-----

All member operations are executed against an `Image <images>`__, so you will
need to set one up first:

.. code-block:: php

  $image = $service->getImage('{imageId}');


Add image tag
-------------

.. code-block:: php

  /** @param $response GuzzleHttp\Psr7\Response */
  $response = $image->addTag('jamie_dev');

Delete image tag
----------------

.. code-block:: php

  /** @param $response GuzzleHttp\Psr7\Response */
  $response = $image->deleteTag('jamie_dev');
