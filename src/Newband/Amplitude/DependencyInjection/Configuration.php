<?php

namespace Newband\Amplitude\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Newband\Amplitude\DependencyInjection
 * @author Zafar <zafar@newband.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('amplitude');

        $rootNode
            ->children()
                ->scalarNode('apiKey')
                    ->isRequired()
                ->end()
            ->end();
        return $treeBuilder;
    }
}