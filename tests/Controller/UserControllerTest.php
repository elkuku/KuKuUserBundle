<?php

namespace KuKu\UserBundle\Tests\Controller;

use KuKu\UserBundle\KuKuUserBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class UserControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $kernel = new KuKuControllerKernel();

        $client = new KernelBrowser($kernel);
        $client->followRedirects(true);
        $client->request('GET', '/user');
        var_dump($client->getResponse()->getContent());
        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}

class KuKuControllerKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new KuKuUserBundle(),
            new FrameworkBundle(),
            new TwigBundle(),
        ];
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml')->prefix('/user');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader): void
    {
        $c->loadFromExtension('framework', [
            'secret' => 'asdqwe',
            'router' => [
                'utf8' => true
            ]
        ]);
    }

    public function getCacheDir(): string
    {
        return __DIR__.'/../cache/'.spl_object_hash($this);
    }
}
