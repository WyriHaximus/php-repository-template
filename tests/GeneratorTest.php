<?php

namespace WyriHaximus\RepositoryTemplate\Tests;

use WyriHaximus\RepositoryTemplate\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $this->assertInternalType('string', (new Generator())->generate('.travis.yml.twig'));
    }
}
