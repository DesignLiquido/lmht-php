<?php

namespace DesignLiquido\Lmht;

use DOMDocument;
use XSLTProcessor;

class Lmht
{
    protected $domXsl;

    public function __construct()
    {
        $this->domXsl = $this->obterEspecificacao();
    }

    public function converterPorString(string $codigoLmht)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');

        $dom->loadXML($codigoLmht);

        return $this->transformarParaXml($dom);
    }

    public function converterPorArquivo(string $caminho)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');

        $dom->load($caminho);

        return $this->transformarParaXml($dom);
    }

    protected function transformarParaXml(DOMDocument $dom)
    {
        $xslt = new XSLTProcessor();

        $xslt->importStylesheet($this->domXsl);

        return $xslt->transformToXML($dom);
    }

    protected function obterEspecificacao()
    {
        $dom = new DOMDocument();

        $dom->load(__DIR__ . '/../especificacao/lmht10.xslt');

        return $dom;
    }
}
