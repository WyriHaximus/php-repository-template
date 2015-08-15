<?php

namespace WyriHaximus\RepositoryTemplate\Tests;

use WyriHaximus\RepositoryTemplate\Scanner;

class ScannerTest extends \PHPUnit_Framework_TestCase
{
    public function testScan()
    {
        $templates = \Phake::mock('League\Flysystem\Filesystem');
        \Phake::when($templates)->listFiles('')->thenReturn([
            [
                'path' => '.travis.yml.twig'
            ],
            [
                'path' => '.dunitconfig.twig'
            ],
            [
                'path' => 'Makefile.twig'
            ],
        ]);
        $target = \Phake::mock('League\Flysystem\Filesystem');
        \Phake::when($target)->listFiles('')->thenReturn([
            [
                'path' => '.travis.yml'
            ],
            [
                'path' => 'README.md'
            ],
            [
                'path' => 'Makefile'
            ],
        ]);
        $files = Scanner::scan($templates, $target);

        $this->assertEquals('.travis.yml.twig', $files[0]->getSource());
        $this->assertEquals('.travis.yml', $files[0]->getTarget());

        $this->assertEquals('Makefile.twig', $files[1]->getSource());
        $this->assertEquals('Makefile', $files[1]->getTarget());
    }
}
