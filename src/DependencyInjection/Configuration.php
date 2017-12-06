<?php

namespace Rokka\RokkaClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('rokka_client');

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->info('Api-Key value given on registration of the user.')
                    ->isRequired()
                ->end()
                ->scalarNode('api_secret')
                    ->info('Deprecated. This is not used anymore.')
                    ->defaultNull()
                ->end()
                ->scalarNode('organization')
                    ->info('Organization value like "my-org" for use in calls to the API.')
                    ->isRequired()
                ->end()
                ->scalarNode('base_url')
                    ->info('Base URL of API, mainly used for testing.')
                    ->defaultValue('https://api.rokka.io')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
