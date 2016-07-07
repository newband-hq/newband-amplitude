<?php

namespace Newband\Amplitude\DependencyInjection;

use Newband\Amplitude\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
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
        $container->setParameter('newband.amplitude.apiKey', $config['apiKey']);
    }
}
