<?php

namespace Rokka\RokkaClientBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class RokkaClientExtension
 */
class RokkaClientExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of arrays of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        // Parameters
        foreach ($config as $name => $value) {
            $container->setParameter('rokka_client.' . $name, $value);
        }

        // Service definitions
        $loader->load('rokka.yml');
    }
}
