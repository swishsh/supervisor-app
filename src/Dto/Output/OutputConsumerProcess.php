<?php

namespace App\Dto\Output;

class OutputConsumerProcess
{
    /** @var string */
    private $workerName;

    /** @var int  */
    private $numprocs = 0;

    /** @var int  */
    private $autostart = 1;

    /** @var int  */
    private $startsecs = -1;

    /** @var int  */
    private $stopwaitsecs = -1;

    /**
     * @return string
     */
    public function getWorkerName(): string
    {
        return $this->workerName;
    }

    /**
     * @param string $workerName
     * @return OutputConsumerProcess
     */
    public function setWorkerName(string $workerName): OutputConsumerProcess
    {
        $this->workerName = $workerName;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumprocs()
    {
        return $this->numprocs;
    }

    /**
     * @return OutputConsumerProcess
     */
    public function incrementNumProcs()
    {
        $this->numprocs++;
        return $this;
    }

    /**
     * @param int $numprocs
     * @return OutputConsumerProcess
     */
    public function setNumprocs(int $numprocs)
    {
        $this->numprocs = $this->numprocs + $numprocs;
        return $this;
    }

    /**
     * @return int
     */
    public function getAutostart()
    {
        return $this->autostart;
    }

    /**
     * @param int $autostart
     * @return OutputConsumerProcess
     */
    public function setAutostart(int $autostart)
    {
        $this->autostart = $this->autostart + $autostart;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartsecs()
    {
        return $this->startsecs;
    }

    /**
     * @param int|null $startsecs
     * @return OutputConsumerProcess
     */
    public function setStartsecs(int $startsecs = null)
    {
        $this->startsecs = $startsecs;
        return $this;
    }

    /**
     * @return int
     */
    public function getStopwaitsecs()
    {
        return $this->stopwaitsecs;
    }

    /**
     * @param int|null $stopwaitsecs
     * @return OutputConsumerProcess
     */
    public function setStopwaitsecs(int $stopwaitsecs = null)
    {
        $this->stopwaitsecs = $stopwaitsecs;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $return = [
            'server' => $this->workerName,
            'numprocs' => $this->numprocs
        ];

        if ($this->startsecs >= 0) {
            $return['startsecs'] = $this->startsecs;
        }

        if ($this->stopwaitsecs >= 0) {
            $return['stopwaitsecs'] = $this->stopwaitsecs;
        }

        return $return;
    }
}
