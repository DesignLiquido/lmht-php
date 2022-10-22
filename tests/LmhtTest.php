<?php

use DesignLiquido\Lmht\Lmht;
use PHPUnit\Framework\TestCase;

class LmhtTest extends TestCase
{

    public function testConverterPorString()
    {
        $html = (new Lmht)->converterPorString(
            '<lmht><corpo></corpo></lmht>'
        );

        $this->assertTrue(strpos($html, '<body>') !== false);

        $this->assertTrue(strpos($html, '</html>') !== false);
    }
}