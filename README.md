# lmht-php
Biblioteca LMHT para PHP. Transforma arquivos LMHT em HTML.

## Instalação

```bash
composer require designliquido/lmht-php
```

## Exemplo de uso

```php
include __DIR__ . '/vendor/autoload.php';

$lmht = new DesignLiquido\Lmht\Lmht;

echo $lmht->converterPorString(
   '<lmht><corpo></corpo></lmht>'
);
```
