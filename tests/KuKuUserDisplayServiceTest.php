<?php

use KuKu\UserBundle\KuKuUserDisplayService;
use PHPUnit\Framework\TestCase;

class KuKuUserDisplayServiceTest extends TestCase
{
    private KuKuUserDisplayService $object;

    protected function setUp(): void
    {
        $this->object = new KuKuUserDisplayService();
    }

    public function testThis(): void
    {
        self::assertSame($this->object->display(), 'Hello sunshine ;=)');
    }
}
