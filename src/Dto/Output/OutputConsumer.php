<?php

namespace App\Dto\Output;

use App\Dto\Input\Consumer;
use App\Dto\Worker;

class OutputConsumer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $command;

    /**
     * @var string
     */
    private $platform;

    /**
     * @var bool
     */
    private $ignore;

    /** @var OutputConsumerProcess[] */
    private $outputConsumerProcesses = [];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return OutputConsumer
     */
    public function setName(string $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return OutputConsumer
     */
    public function setTemplate(string $template = null)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param string $command
     * @return OutputConsumer
     */
    public function setCommand(string $command = null)
    {
        $this->command = $command;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string|null $platform
     * @return OutputConsumer
     */
    public function setPlatform(string $platform = null)
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIgnore()
    {
        return $this->ignore;
    }

    /**
     * @param bool $ignore
     * @return OutputConsumer
     */
    public function setIgnore($ignore)
    {
        $this->ignore = $ignore;
        return $this;
    }

    /**
     * ConsumerOutput constructor.
     */
    public function __construct(Consumer $consumer)
    {
        $this->setName($consumer->getName())
            ->setPlatform($consumer->getPlatform())
            ->setCommand($consumer->getCommand())
            ->setIgnore($consumer->isIgnore())
            ->setTemplate($consumer->getTemplate());
    }

    /**
     * @param Worker $worker
     * @param OutputConsumer $consumer
     *
     * @return OutputConsumer
     */
    public function addProcess(Worker $worker, Consumer $consumer) : OutputConsumer
    {
        $outputConsumerProcess = $this->getProcess($worker);

        $outputConsumerProcess->setWorkerName($worker->getName())
            ->setStopwaitsecs($consumer->getStopwaitsecs())
            ->setStartsecs($consumer->getStartsecs())
            ->setAutostart($consumer->getAutostart())
            ->incrementNumProcs();

        return $this;
    }

    /**
     * @param Worker $worker
     *
     * @return OutputConsumerProcess
     */
    private function getProcess(Worker $worker) {
        foreach ($this->outputConsumerProcesses as $process) {
            if ($process->getWorkerName() === $worker->getName()) {
                return $process;
            }
        }

        $process = new OutputConsumerProcess();
        $this->outputConsumerProcesses[] = $process;

        return $process;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $processCollection = [];
        foreach ($this->outputConsumerProcesses as $process) {
            $processCollection[] = $process->toArray();
        }


        $response = [];
        if (null !== $this->isIgnore()) {
            $response['ignore'] = $this->isIgnore();
        }

        $response['template'] = $this->getTemplate();
        $response['command'] = $this->getCommand();
        $response['platforms'] = [$this->getPlatform() => $processCollection];

        return $response;
    }
}
