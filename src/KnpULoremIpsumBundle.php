<?php

namespace KnpU\LoremIpsumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KnpULoremIpsumBundle extends Bundle
{
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
