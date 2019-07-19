<?php

namespace App\Service\Read;

use App\Dto\Consumer;
use Symfony\Component\Yaml\Yaml;

class ReadSupervisorYaml
{
    const ID = 'read.read_supervisor_yaml';

    /**
     * @return Consumer[]
     */
    public function readConsumers() : array
    {
        $supervisorConfig = $this->readYaml();
        $consumerCollection = array();

        foreach ($supervisorConfig['supervisor'] as $consumerName => $consumerLine) {
            $consumer = ConsumerBuilder::build($consumerName, $consumerLine);

            $consumerCollection[] = $consumer;
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
