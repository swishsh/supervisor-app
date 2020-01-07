<?php

namespace App\Dto;

class Worker
{
    /** @var string */
    private $name;

    /** @var int */
    private $currentLoad;

    /** @var int */
    private $maxLoad;

    /**
     * Worker constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->currentLoad = 0;
        $this->maxLoad = ConfigurationPage::MAX_LOAD;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Worker
     */
    public function setName(string $name): Worker
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentLoad(): int
    {
        return $this->currentLoad;
    }

    /**
     * @param int $value
     * @return Worker
     */
    public function incrementCurrentLoad(int $value = 1): Worker
    {
        $this->currentLoad = $this->currentLoad + $value;
        return $this;
    }


    /**
     * @return int
     */
    public function getMaxLoad(): int
    {
        return $this->maxLoad;
    }

    /**
     * @param int $maxLoad
     * @return Worker
     */
    public function setMaxLoad(int $maxLoad): Worker
    {
        $this->maxLoad = $maxLoad;
        return $this;
    }
}
