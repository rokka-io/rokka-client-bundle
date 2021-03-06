<?php

namespace Rokka\RokkaClientBundle\Tests\Functional\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ConsoleTest extends KernelTestCase
{
    /**
     * Run the console and make sure the rokka commands show up.
     */
    public function testConsole()
    {
        static::bootKernel();

        $output = new BufferedOutput();
        $application = new Application(static::$kernel);
        $application->setAutoExit(false);
        $exitCode = $application->run(new StringInput(''), $output);

        $outputText = $output->fetch();

        $this->assertEquals(0, $exitCode, $outputText);

        // do not fix the number of commands to be flexible when new commands get added
        // the point of this test is to see that commands are loaded and show up in the console
        $this->assertTrue(substr_count($outputText, '  rokka:') > 20, substr($outputText, 0, 2000)."...\n\n");
    }
}
