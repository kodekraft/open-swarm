<?php

namespace KodeKraft\OpenSwarm\Tests\Commands;

use KodeKraft\OpenSwarm\Commands\LoadCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class LoadCommandTest
 *
 * @package KodeKraft\OpenSwarm\Tests\Commands
 */
class LoadCommandTest extends KernelTestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $kernel = self::bootKernel();
        $this->app = new Application($kernel);
        $this->app->add(new LoadCommand(base_path()));
    }

    /**
     * @test
     * @expectedException \Symfony\Component\Console\Exception\RuntimeException
     * @expectedExceptionMessage Not enough arguments (missing: "file").
     */
    public function exceptionOnNoFileArgument()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
        ]);
    }

    /**
     * @test
     * @expectedException \Symfony\Component\Console\Exception\RuntimeException
     * @expectedExceptionMessage Not enough arguments (missing: "file").
     */
    public function exceptionOnNullFile()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'file'    => null,
        ]);
    }

    /**
     * @test
     * @expectedException \Symfony\Component\Console\Exception\RuntimeException
     * @expectedExceptionMessage Not enough arguments (missing: "file").
     */
    public function exceptionOnEmptyFile()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'file'    => '',
        ]);
    }

    /**
     * @test
     */
    public function errorOnInvalidHostname()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'file'    => 'tests/Resources/swagger-invalid-hostname.json',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains("Your hostname 'http://foo bar' is invalid.", $output);
    }

    /**
     * @test
     */
    public function errorOnInvalidHttpMethod()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            'file'     => 'tests/Resources/swagger.json',
            '--method' => 'foobar',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains("Your method 'foobar' is invalid.", $output);
    }

    /**
     * @test
     */
    public function errorOnPathNonExistent()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            'file'     => 'tests/Resources/swagger.json',
            '--path'   => 'api/v1/foobar',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains("The path 'api/v1/foobar' does not exist in your file.", $output);
    }

    /**
     * @test
     */
    public function errorOnPathNotContainingMethod()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            'file'     => 'tests/Resources/swagger.json',
            '--path'   => '/pet',
            '--method' => 'get',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains("The path '/pet' does not contain a 'get' method.", $output);
    }

    /**
     * @test
     */
    public function suppliedOptionalPathAndMethod()
    {
        $command = $this->app->find('load');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            'file'     => 'tests/Resources/swagger.json',
            '--path'   => '/pet',
            '--method' => 'post',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains("The path '/pet' does not contain a 'get' method.", $output);
    }
}