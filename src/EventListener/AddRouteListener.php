<?php

declare(strict_types=1);

namespace GtmPlugin\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Xynnn\GoogleTagManagerBundle\Service\GoogleTagManagerInterface;

final class AddRouteListener
{
    private GoogleTagManagerInterface $googleTagManager;

    public function __construct(GoogleTagManagerInterface $googleTagManager)
    {
        $this->googleTagManager = $googleTagManager;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $this->googleTagManager->setData('route', $event->getRequest()->get('_route'));
    }
}
