<?php

namespace SiaSkem\Common\Events;

interface DomainEvent
{
    /**
    * @return DateTimeImmutable
    */
    public function occurredOn();
}