<?php

namespace App\Service\Worker;

use App\Dto\ConfigurationPage;
use App\Dto\Worker;
use App\Dto\WorkerCollection;

class WorkerService
{
    /**
     * @return WorkerCollection
     */
    public static function initWorkers() : WorkerCollection
    {
        $workerFactory = new WorkerFactory();
        $workerCollection = new WorkerCollection();

        for ($i = 1; $i <= ConfigurationPage::NUMBER_OF_WORKERS; $i++) {
            $worker = $workerFactory->createWorker($i, ConfigurationPage::COUNTRY_CODE);
            $workerCollection->addWorker($worker);
        }

        return $workerCollection;
    }

    /**
     * @param WorkerCollection $workerCollection
     *
     * @return Worker
     */
    public static function getLeastLoadWorker(WorkerCollection $workerCollection) : Worker
    {
        /** @var Worker $leastLoadWorker */
        $leastLoadWorker = $workerCollection->getWorkers()[0];

        foreach ($workerCollection->getWorkers() as $worker) {
            if ($worker->getCurrentLoad() < $leastLoadWorker->getCurrentLoad()) {
                $leastLoadWorker = $worker;
            }
        }

        return $leastLoadWorker;
    }
}
