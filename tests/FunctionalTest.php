<?php

namespace KnpU\LoremIpsumBundle\Tests;

use KnpU\LoremIpsumBundle\KnpUIpsum;
use KnpU\LoremIpsumBundle\KnpULoremIpsumBundle;
use KnpU\LoremIpsumBundle\KnpUWordProviderInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $kernel = new KnpULoremIpsumTestingKernel();
        $kernel->boot();
        $container = $kernel->getContainer();

        $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');
        $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
        $this->assertIsString($ipsum->getParagraphs());
    }

    public function tearDown(): void
    {
        system("rm -rf ".escapeshellarg(__DIR__ . '/../var/cache'));
    }
}

class KnpULoremIpsumTestingKernel extends Kernel
{
    public function __construct()
    {
        parent::__construct('dev', true);
    }

    public function registerBundles()
    {
        return [
            new KnpULoremIpsumBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->register('stub_word_provider', StubWordProvider::class)
                ->addTag('knpu_ipsum_word_provider');
            //$container->loadFromExtension('knpu_lorem_ipsum', $this->config);
        });
    }

    /*public function getCacheDir()
    {
        return __DIR__ . '/var/cache/' . spl_object_hash($this);
    }*/
}

class StubWordProvider implements KnpUWordProviderInterface
{
    public function getWords(): array
    {
        return ['stub', 'stub1'];
    }
}
