<?php

namespace App\Service\Worker;

use App\Dto\ConfigurationPage;
use App\Dto\Worker;

class WorkerFactory
{
    /**
     * @param int $workerNumber
     * @param string $countryCode
     * @return Worker
     */
    public function createWorker(int $workerNumber, string $countryCode) : Worker
    {
        return new Worker(sprintf(ConfigurationPage::WORKER_NAME, $workerNumber, $countryCode));
    }
}
