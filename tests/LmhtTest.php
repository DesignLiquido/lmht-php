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


    public function testConverterPorArquivo()
    {
        $file = __DIR__ . '/../especificacao/exemplo.lmht';

        $html = (new Lmht)->converterPorArquivo($file);

        $this->assertTrue(strpos($html, '<body>') !== false);

        $this->assertTrue(strpos($html, '</html>') !== false);

        $this->assertTrue(strpos($html, 'Isto é um parágrafo.') !== false);
    }
}