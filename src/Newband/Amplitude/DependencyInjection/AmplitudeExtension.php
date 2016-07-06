<?php

namespace Amplitude\Symfony\DependencyInjection;


use Newband\Amplitude\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class AmplitudeExtension
 * @package Amplitude\Symfony\DependencyInjection
 * @author Zafar <zafar@newband.com>
 */
class AmplitudeExtension extends Extension
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