<?php

namespace Rokka\RokkaClientBundle\DependencyInjection;

use RokkaCli\ConsoleApplication;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class RokkaClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $reflection = new \ReflectionClass(ConsoleApplication::class);
        $filename = $reflection->getFileName();

        if (false === $filename) {
            throw new \RuntimeException('Could not determine the configuration folder for the CLI tools');
        }
        $loader = new XmlFileLoader(
            $container,
            new FileLocator([
                __DIR__.'/../Resources/config',
                \dirname($filename).'/config',
            ])
        );

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        // Parameters
        foreach ($config as $name => $value) {
            if ('web_path_resolver' === $name) {
                $name = 'web_path_resolver.root_dir';
                $value = $value['root_dir'];
            }
            $container->setParameter('rokka_client.'.$name, $value);
        }

        $loader->load('rokka.xml');

        // load commands from cli
        $loader->load('commands.xml');
        if ($config['organization']) {
            $loader->load('restricted_commands.xml');
        }
        // set the command name prefix argument for rokka commands
        // we need to loop over all services of this bundle, if we use findTaggedServiceIds, things explode later inside Symfony.
        foreach ($container->getDefinitions() as $name => $definition) {
            if (str_starts_with($name, 'rokka.command.') && $definition->hasTag('console.command')) {
                $tagAttributes = $definition->getTag('console.command')[0];
                if (\array_key_exists('command', $tagAttributes)) {
                    if (interface_exists(CommandLoaderInterface::class)) { // since symfony 3.4
                        // when we drop support for Symfony < 3.4, we can drop the interface check and the else clause
                        // and remove the command name from the command classes to only have them in the tag
                        $definition->clearTag('console.command');
                        $tagAttributes['command'] = 'rokka:'.$tagAttributes['command'];
                        $definition->addTag('console.command', $tagAttributes);
                    } else {
                        $definition->addArgument('rokka:');
                    }
                }
            }
        }
    }
}
