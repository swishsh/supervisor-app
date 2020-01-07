<?php

namespace App\Service;

use App\Dto\Input\ConsumerCollection;
use App\Dto\Output\OutputConsumer;
use App\Dto\Output\OutputConsumerCollection;
use App\Service\Worker\WorkerService;
use App\Service\Write\WriteSupervisorYaml;

class SupervisorService
{
    public function doTheMagic(ConsumerCollection $consumerCollection)
    {
        $workerService = new WorkerService();
        $writeSupervisorYaml = new WriteSupervisorYaml();

        $workerCollection = $workerService->initWorkers();
        $consumerOutputCollection = new OutputConsumerCollection();

        foreach ($consumerCollection->getConsumers() as $consumer) {
            $outputConsumer = new OutputConsumer($consumer);

            for ($i = 1; $i <= $consumer->getNumprocs(); $i++) {
                $worker = $workerService->getLeastLoadWorker($workerCollection);
                $worker->incrementCurrentLoad();

                $outputConsumer->addProcess($worker, $consumer);
            }

            $consumerOutputCollection->addConsumerOutput($outputConsumer);
        }

        $writeSupervisorYaml->writeConsumers($consumerOutputCollection);
    }
}
