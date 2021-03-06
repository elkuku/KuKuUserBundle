<?php

namespace KuKu\UserBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KuKuUserExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // var_dump($configs);die;
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        // $definition = $container->getDefinition('kukuknpu_lorem_ipsum.knpu_ipsum');
        // $definition->setArgument(0, $config['unicorns_are_real']);
        // $definition->setArgument(1, $config['min_sunshine']);

        // var_dump($config);die;
    }

    public function getAlias(): string
    {
        return 'kuku_user';
    }
}
