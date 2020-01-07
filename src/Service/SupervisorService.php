<?php

namespace App\Service;

use App\Dto\Input\ConsumerCollection;
use App\Dto\Output\OutputConsumer;
use App\Dto\Output\OutputConsumerCollection;
use App\Service\Worker\WorkerService;
use App\Service\Write\WriteSupervisorYaml;

class SupervisorService
{
    /**
     * @param ConsumerCollection $consumerCollection
     */
    public function recomputeSupervisor(ConsumerCollection $consumerCollection)
    {
        $workerCollection = WorkerService::initWorkers();
        $consumerOutputCollection = new OutputConsumerCollection();

        foreach ($consumerCollection->getConsumers() as $consumer) {
            $outputConsumer = new OutputConsumer($consumer);

            for ($i = 1; $i <= $consumer->getNumprocs(); $i++) {
                $worker = WorkerService::getLeastLoadWorker($workerCollection);
                $worker->incrementCurrentLoad();

                $outputConsumer->addProcess($worker, $consumer);
            }

            $consumerOutputCollection->addOutputConsumer($outputConsumer);
        }

        WriteSupervisorYaml::writeConsumers($consumerOutputCollection);
    }
}
