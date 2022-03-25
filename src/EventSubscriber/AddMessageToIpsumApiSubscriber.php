<?php

namespace KnpU\LoremIpsumBundle\EventSubscriber;

use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;
use KnpU\LoremIpsumBundle\Event\KnpuLoremIpsumEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddMessageToIpsumApiSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
         return [
             KnpuLoremIpsumEvents::FILTER_API => 'onFilterApi'
         ];
    }

    public function onFilterApi(FilterApiResponseEvent $event)
    {
        $data = $event->getData();
        $data['message'] = 'Magic Day!';
        $event->setData($data);
    }
}
