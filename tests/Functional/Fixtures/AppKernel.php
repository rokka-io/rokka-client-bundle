<?php

namespace Rokka\RokkaClientBundle\Tests\Functional\Fixtures;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles(): iterable
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Rokka\RokkaClientBundle\RokkaClientBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/app/config/config.yml');
    }

    public function getCacheDir(): string
    {
        return sys_get_temp_dir().'/rokka-client-bundle/cache';
    }

    public function getLogDir(): string
    {
        return sys_get_temp_dir().'/rokka-client-bundle/logs';
    }
}

/* BC to run tests on Symfony < 3.3 */
class_alias(AppKernel::class, \AppKernel::class, false);
