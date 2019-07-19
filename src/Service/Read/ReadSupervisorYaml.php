<?php

namespace App\Service\Read;

use App\Dto\ConsumerCollection;
use Symfony\Component\Yaml\Yaml;

class ReadSupervisorYaml
{
    const ID = 'read.read_supervisor_yaml';

    /**
     * @return ConsumerCollection
     */
    public function readConsumers() : ConsumerCollection
    {
        $supervisorConfig = $this->readYaml();
        $consumerCollection = new ConsumerCollection();

        foreach ($supervisorConfig['supervisor'] as $consumerName => $consumerLine) {
            $consumer = ConsumerBuilder::build($consumerName, $consumerLine);

            $consumerCollection->addConsumer($consumer);
        }

        return $consumerCollection;
    }

    /**
     * @return array
     */
    private function readYaml() : array
    {
        $supervisorConfig = Yaml::parseFile(__DIR__ . '/supervisor.yml');

        return $supervisorConfig;
    }
}
