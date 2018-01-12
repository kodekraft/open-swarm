<?php

namespace KodeKraft\OpenSwarm\Tests;

/**
 * Class TestCase
 *
 * @package KodeKraft\OpenSwarm\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $filename
     *
     * @return bool|string
     */
    protected function getResource(string $filename)
    {
        return file_get_contents(__DIR__ . "/Resources/{$filename}");
    }
}
