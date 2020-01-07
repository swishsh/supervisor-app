<?php

namespace App\Service\Write;

use App\Dto\Output\OutputConsumerCollection;
use App\Service\WriteSupervisorInterface;
use Symfony\Component\Yaml\Yaml;

class WriteSupervisorYaml implements WriteSupervisorInterface
{
    public function writeConsumers(OutputConsumerCollection $consumerCollection)
    {
        $yamlString = Yaml::dump($consumerCollection->toArray(), 5);

        $this->write($yamlString);
    }

    /**
     * @param string $yamlString
     */
    private function write(string $yamlString)
    {
        $outputSupervisor = fopen(__DIR__ . '/../Files/outputsupervisor.yml', 'w');
        fwrite($outputSupervisor, $yamlString);
        fclose($outputSupervisor);
    }
}
