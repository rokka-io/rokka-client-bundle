<?php

namespace Rokka\RokkaClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('rokka_client');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->info('Api-Key value given on registration of the user.')
                    ->isRequired()
                ->end()
                ->scalarNode('organization')
                    ->info('Organization value like "my-org" for use in calls to the API.')
                    ->isRequired()
                ->end()
                ->scalarNode('base_url')
                    ->info('Base URL of API, mainly used for testing.')
                    ->defaultValue('https://api.rokka.io')
                ->end()
                ->arrayNode('web_path_resolver')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('root_dir')
                            ->info('Root directory where the twig filters look for images')
                            ->defaultValue('%kernel.project_dir%/public/')
                        ->end()
                    ->end()
                ->end()
            ->end();

        $secretNode = $rootNode->children()->scalarNode('api_secret')
            ->info('Deprecated. This is not used anymore.')
            ->defaultNull();

        if (method_exists($secretNode, 'setDeprecated')) {
            $secretNode->setDeprecated('rokka/client-bundle', '1.1.0', 'This is not used anymore');
        }

        return $treeBuilder;
    }
}
