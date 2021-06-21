<?php
namespace KuKu\UserBundle\Tests;

use KuKu\UserBundle\KuKuUserBundle;
use KuKu\UserBundle\KuKuUserDisplayService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{
    public function testServiceWiring(): void
    {
        $kernel = new KnpULoremIpsumTestingKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $displayService = $container->get('kuku_user.kuku_user_display_service');
        $this->assertInstanceOf(KuKuUserDisplayService::class, $displayService);
        $this->assertIsString($displayService->display());
    }
}

class KnpULoremIpsumTestingKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new KuKuUserBundle(),
        ];
    }
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }
}
