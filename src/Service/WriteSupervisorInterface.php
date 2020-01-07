<?php

namespace App\Service;

use App\Dto\Output\OutputConsumerCollection;

interface WriteSupervisorInterface
{
    public function writeConsumers(OutputConsumerCollection $consumerOutputCollection);
}
