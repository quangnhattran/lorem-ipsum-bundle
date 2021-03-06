<?php

namespace KnpU\LoremIpsumBundle\Event;

final class KnpuLoremIpsumEvents
{
    /**
     * Called directly before the Lorem Ipsum API data is returned
     * Listeners have the opportunity to change that data
     * @Event("KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent")
     */
    const FILTER_API = 'knpu_lorem.filter_event';
}
