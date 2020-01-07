<?php

namespace App\Dto\Input;

class ConsumerCollection
{
    /**
     * @var Consumer[]
     */
    private $consumers = [];

    /**
     * @return Consumer[]
     */
    public function getConsumers(): array
    {
        return $this->consumers;
    }

    /**
     * @param Consumer $consumer
     * @return ConsumerCollection
     */
    public function addConsumer(Consumer $consumer): ConsumerCollection
    {
        $this->consumers[] = $consumer;

        return $this;
    }
}
