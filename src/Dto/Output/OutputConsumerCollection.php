<?php

namespace App\Dto\Output;

class OutputConsumerCollection
{
    /** @var OutputConsumer[] */
    private $consumerOutputs;

    /**
     * @param OutputConsumer $consumerOutput
     * @return OutputConsumerCollection
     */
    public function addOutputConsumer(OutputConsumer $consumerOutput): OutputConsumerCollection
    {
        $this->consumerOutputs[] = $consumerOutput;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $supervisor = [];

        foreach($this->consumerOutputs as $consumerOutput) {
            $supervisor[$consumerOutput->getName()] = $consumerOutput->toArray();
        }

        $return = [
            'deploy' => 'ieis-ro',
            'supervisor' => $supervisor
        ];

        return $return;
    }
}
