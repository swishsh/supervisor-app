<?php

namespace App\Service;


use App\Dto\Input\ConsumerCollection;

interface ReadSupervisorInterface
{
    public function readConsumers() : ConsumerCollection;
}
