<?php

namespace App\Dto;

class Consumer
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
     * @var int
     */
    private $numprocs;

    /**
     * @var int
     */
    private $autostart;

    /**
     * @var int
     */
    private $startsecs;

    /**
     * @var bool
     */
    private $ignore;

    /**
     * @var int
     */
    private $stopwaitsecs;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Consumer
     */
    public function setName(string $name): Consumer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return Consumer
     */
    public function setTemplate(string $template = null): Consumer
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     * @return Consumer
     */
    public function setCommand(string $command = null): Consumer
    {
        $this->command = $command;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return Consumer
     */
    public function setPlatform(string $platform): Consumer
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumprocs(): int
    {
        return $this->numprocs;
    }

    /**
     * @param int $numprocs
     * @return Consumer
     */
    public function setNumprocs(int $numprocs): Consumer
    {
        $this->numprocs = $this->numprocs + $numprocs;
        return $this;
    }

    /**
     * @return int
     */
    public function getAutostart(): int
    {
        return $this->autostart;
    }

    /**
     * @param int $autostart
     * @return Consumer
     */
    public function setAutostart(int $autostart): Consumer
    {
        $this->autostart = $this->autostart + $autostart;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartsecs(): int
    {
        return $this->startsecs;
    }

    /**
     * @param int $startsecs
     * @return Consumer
     */
    public function setStartsecs(int $startsecs = null): Consumer
    {
        $this->startsecs = $startsecs;
        return $this;
    }

    /**
     * @return int
     */
    public function getStopwaitsecs(): int
    {
        return $this->stopwaitsecs;
    }

    /**
     * @param int $stopwaitsecs
     * @return Consumer
     */
    public function setStopwaitsecs(int $stopwaitsecs = null): Consumer
    {
        $this->stopwaitsecs = $stopwaitsecs;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIgnore(): bool
    {
        return $this->ignore;
    }

    /**
     * @param bool $ignore
     * @return Consumer
     */
    public function setIgnore(bool $ignore): Consumer
    {
        $this->ignore = $ignore;
        return $this;
    }
}
