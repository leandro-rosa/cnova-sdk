<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Invoice implements ArrayAccess {
  static $swaggerTypes = array(
      'cnpj' => 'string',
      'number' => 'string',
      'serie' => 'string',
      'issued_at' => 'DateTime',
      'access_key' => 'string',
      'link_xml' => 'string',
      'link_danfe' => 'string'
  );

  static $attributeMap = array(
      'cnpj' => 'cnpj',
      'number' => 'number',
      'serie' => 'serie',
      'issued_at' => 'issuedAt',
      'access_key' => 'accessKey',
      'link_xml' => 'linkXml',
      'link_danfe' => 'linkDanfe'
  );

  
  /**
  * CNPJ responsável pelo envio dos produtos. Pode ser diferente caso a empresa possua diversos Centros de Distribuição (CDs)
  */
  public $cnpj; /* string */
  /**
  * Número da Nota Fiscal
  */
  public $number; /* string */
  /**
  * Número de serie da Nota Fiscal
  */
  public $serie; /* string */
  /**
  * Data de emissão da Nota Fiscal
  */
  public $issued_at; /* DateTime */
  /**
  * Número da chave de acesso à nota fiscal. A chave possui 44 dígitos e contém todas as informações da DANFE
  */
  public $access_key; /* string */
  /**
  * Url para consulta da NFE
  */
  public $link_xml; /* string */
  /**
  * Url para consulta da DANFE
  */
  public $link_danfe; /* string */

  public function __construct(array $data = null) {
    $this->cnpj = $data["cnpj"];
    $this->number = $data["number"];
    $this->serie = $data["serie"];
    $this->issued_at = $data["issued_at"];
    $this->access_key = $data["access_key"];
    $this->link_xml = $data["link_xml"];
    $this->link_danfe = $data["link_danfe"];
  }

  public function offsetExists($offset) {
    return isset($this->$offset);
  }

  public function offsetGet($offset) {
    return $this->$offset;
  }

  public function offsetSet($offset, $value) {
    $this->$offset = $value;
  }

  public function offsetUnset($offset) {
    unset($this->$offset);
  }
}
