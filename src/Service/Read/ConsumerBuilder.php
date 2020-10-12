<?php

namespace App\Service\Read;


use App\Dto\Input\Consumer;

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
        $consumer = new Consumer();

        $consumer->setTemplate(isset($consumerData['template']) ? $consumerData['template'] : "")
            ->setCommand(isset($consumerData['command']) ? $consumerData['command'] : "")
            ->setIgnore(isset($consumerName['ignore']) ? (bool)$consumerName['ignore'] : false)
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
            $consumer->increaseNumprocs($consumerThread['numprocs'])
                ->setStartsecs(isset($consumerThread['startsecs']) ? $consumerThread['startsecs'] : -1)
                ->setStopwaitsecs(isset($consumerThread['stopwaitsecs']) ? $consumerThread['stopwaitsecs'] : -1);

            $sign = 1;
            if (!isset($consumerThread['autostart']) || $consumerThread['autostart'] != 0) {
                $consumer->setAutostart(1);
                continue;
            }

            if (0 === $consumerThread['autostart']) {
                $consumer->setAutostart(0);
            }
        }
    }
}
