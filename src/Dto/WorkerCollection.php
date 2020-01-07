<?php

namespace App\Dto;

class WorkerCollection
{
    /** @var Worker[] */
    private $workers = [];

    /**
     * @return Worker[]
     */
    public function getWorkers(): array
    {
        return $this->workers;
    }

    /**
     * @param Worker $worker
     * @return WorkerCollection
     */
    public function addWorker(Worker $worker): WorkerCollection
    {
        $this->workers[] = $worker;
        return $this;
    }
}
