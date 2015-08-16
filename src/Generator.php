<?php

namespace WyriHaximus\RepositoryTemplate;

class Generator
{
    /**
     * @var array
     */
    protected $context;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param array $context
     */
    public function __construct($context = [])
    {
        $this->context = $context;
        $loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
        $this->twig = new \Twig_Environment($loader);
    }

    /**
     * @param string $template
     * @return string
     */
    public function generate($template)
    {
        return $this->twig->render($template, []);
    }
}
