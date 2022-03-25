<?php

namespace KnpU\LoremIpsumBundle\Controller;

use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;
use KnpU\LoremIpsumBundle\Event\KnpuLoremIpsumEvents;
use KnpU\LoremIpsumBundle\EventSubscriber\AddMessageToIpsumApiSubscriber;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class IpsumApiController extends AbstractController
{
    private KnpUIpsum $ipsum;
    private EventDispatcherInterface $eventDispatcher;

    public function __construct($ipsum, EventDispatcherInterface $eventDispatcher = null)
    {
        $this->ipsum = $ipsum;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function index()
    {
        $data = [
            'sentences' => $this->ipsum->getSentences(),
            'paragraphs' => $this->ipsum->getParagraphs(),
        ];

        $event = new FilterApiResponseEvent($data);
        if ($this->eventDispatcher) {
            $this->eventDispatcher->addSubscriber(new AddMessageToIpsumApiSubscriber());
            $this->eventDispatcher->dispatch(KnpuLoremIpsumEvents::FILTER_API, $event);
        }

        return $this->json($event->getData());
    }
}
