<?php

namespace KuKu\UserBundle;

use KuKu\UserBundle\DependencyInjection\KuKuUserExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KuKuUserBundle extends Bundle
{
    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension(): KuKuUserExtension
    {
        if (null === $this->extension) {
            $this->extension = new KuKuUserExtension();
        }
        return $this->extension;
    }
}
