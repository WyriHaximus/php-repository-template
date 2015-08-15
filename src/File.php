<?php

namespace WyriHaximus\RepositoryTemplate;

class File
{
    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $target;

    /**
     * @param string $source
     * @param string $target
     */
    public function __construct($source, $target)
    {
        $this->source = $source;
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }
}
