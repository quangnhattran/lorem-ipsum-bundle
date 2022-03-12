<?php

namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('knpu_lorem_ipsum');

        $node = (new ArrayNodeDefinition('level1'))
            ->children()
              ->scalarNode('foo')->end()
             ->scalarNode('baz')->end()
             ->end()
         ;

        $rootNode
            ->children()
                ->booleanNode('unicorns_are_real')->defaultTrue()->info('Whether or not you believe in unicorn?')->end()
                ->integerNode('min_sunshine')->defaultValue(3)->info('How many sunshine you want?')->end()
                ->scalarNode('word_provider')->defaultNull()->end()
                ->append($node)
            ->end();

        return $treeBuilder;
    }
}
