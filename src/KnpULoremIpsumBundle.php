<?php

namespace KnpU\LoremIpsumBundle;

use KnpU\LoremIpsumBundle\DependencyInjection\Compiler\WordProviderCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KnpULoremIpsumBundle extends Bundle
{
    public function build(ContainerBuilder $containerBuilder)
    {
            $containerBuilder->addCompilerPass(new WordProviderCompilerPass());
    }

    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $extension = $this->createContainerExtension();
            if (null !== $extension) {
                $this->extension = $extension;
            } else {
                $this->extension = false;
            }
        }

        return $this->extension;
    }
}
