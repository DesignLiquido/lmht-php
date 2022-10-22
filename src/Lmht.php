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

        return $this->transformarXML($dom);
    }

    public function converterPorArquivo(string $caminho)
    {
        $dom = new DOMDocument();

        $dom->load($caminho);

        return $this->transformarXML($dom);
    }

    protected function transformarXML(DOMDocument $dom)
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