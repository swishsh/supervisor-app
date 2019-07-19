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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Consumer
     */
    public function setName(string $name)
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
     * @return Consumer
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
     * @return Consumer
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
     * @param string $platform
     * @return Consumer
     */
    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
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
     * @param int $numprocs
     * @return Consumer
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
     * @return Consumer
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
     * @param int $startsecs
     * @return Consumer
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
     * @param int $stopwaitsecs
     * @return Consumer
     */
    public function setStopwaitsecs(int $stopwaitsecs = null)
    {
        $this->stopwaitsecs = $stopwaitsecs;
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
     * @return Consumer
     */
    public function setIgnore(bool $ignore)
    {
        $this->ignore = $ignore;
        return $this;
    }
}
