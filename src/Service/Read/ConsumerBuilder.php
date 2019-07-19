<?php

namespace App\Service\Read;

use App\Dto\Consumer;

class ConsumerBuilder
{
    /**
     * @param string $consumerName
     * @param array $consumerData
     *
     * @return Consumer
     */
    public static function build(string $consumerName, array $consumerData) : Consumer
    {
//        if (null === $consumerData['template']) {
//            echo ($consumerName . '\n');
//            var_dump($consumerData);
//            die();
//        }


        $consumer = new Consumer();

        $consumer->setTemplate($consumerData['template'])
            ->setCommand($consumerData['command'])
            ->setIgnore((bool)$consumerName['ignore'])
            ->setName($consumerName);

        foreach($consumerData['platforms'] as $platform => $consumerThreads) {
            $consumer->setPlatform($platform);

            self::updateConsumerLineProperties($consumerThreads, $consumer);
        }

        return $consumer;
    }

    /**
     * @param array $consumerThreads
     * @param Consumer $consumer
     */
    private static function updateConsumerLineProperties(array $consumerThreads, Consumer $consumer)
    {
        foreach ($consumerThreads as $consumerThread) {
            $consumer->setNumprocs($consumerThread['numprocs'])
                ->setStartsecs($consumerThread['startsecs'])
                ->setStopwaitsecs($consumerThread['stopwaitsecs']);

            $sign = 1;
            if (0 === $consumerThread['autostart']) {
                $sign = -1;
            }

            $consumer->setAutostart($sign * $consumerThread['autostart']);
        }
    }
}
