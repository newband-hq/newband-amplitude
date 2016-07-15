<?php

namespace Newband\Amplitude\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class NewbandAmplitudeExtension
 * @package Amplitude\Symfony\DependencyInjection
 * @author Zafar <zafar@newband.com>
 */
class NewbandAmplitudeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('clients.xml');

        $this->loadClients($config, $container);
    }

    /**
     * @param array $config
     * @param ContainerBuilder $container
     */
    private function loadClients($config, ContainerBuilder $container)
    {
        $clients = array('event', 'identity');

        foreach ($clients as $client) {
            $id = sprintf('newband_amplitude.client.%s', $client);
            $clientDefinition = $container->getDefinition($id);
            $clientDefinition->replaceArgument(0, $config['apiKey']);
            if (isset($config['options']) && !empty($config['options'])) {
                $clientDefinition->addArgument($config['options']);
            }
        }
    }
}
