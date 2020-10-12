<?php

namespace App\Service\Write;

use App\Dto\Output\OutputConsumerCollection;
use Symfony\Component\Yaml\Yaml;

class WriteSupervisorYaml
{
    public static function writeConsumers(OutputConsumerCollection $consumerCollection)
    {
        $yamlString = Yaml::dump($consumerCollection->toArray(), 5, 4, 1024);

        $outputSupervisor = fopen(__DIR__ . '/../Files/outputsupervisor.yml', 'w');
        fwrite($outputSupervisor, $yamlString);
        fclose($outputSupervisor);
    }
}
