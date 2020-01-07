<?php

namespace App\Service\Read;

use App\Dto\Input\ConsumerCollection;
use App\Service\ReadSupervisorInterface;
use Symfony\Component\Yaml\Yaml;

class ReadSupervisorYaml implements ReadSupervisorInterface
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
        $filePath = __DIR__ . '/../Files/supervisor.yml';

        if (file_exists(__DIR__ . '/../Files/outputsupervisor.yml')) {
            $filePath = __DIR__ . '/../Files/outputsupervisor.yml';
        }

        return Yaml::parseFile($filePath);
    }
}
