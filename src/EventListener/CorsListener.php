<?php
namespace App\EventListener;
/**
 * Created by PhpStorm.
 * User: oliv
 * Date: 03/12/2017
 * Time: 19:15
 */

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class CorsListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $responseHeaders = $event->getResponse()->headers;

        $responseHeaders->set('Access-Control-Allow-Headers', 'origin, content-type, accept, authorization');
        $responseHeaders->set('Access-Control-Allow-Origin', '*');
        $responseHeaders->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, OPTIONS');
//        $responseHeaders->set('Content-Type', 'application/x-www-form-urlencoded');
    }
}