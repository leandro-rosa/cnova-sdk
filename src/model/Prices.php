<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Prices implements ArrayAccess {
  static $swaggerTypes = array(
      'default' => 'double',
      'offer' => 'double',
      'site' => 'string'
  );

  static $attributeMap = array(
      'default' => 'default',
      'offer' => 'offer',
      'site' => 'site'
  );

  
  /**
  * Preço de do produto no Marketplace
  */
  public $default; /* double */
  /**
  * Preço real de venda. Preço por do produto no Marketplace
  */
  public $offer; /* double */
  /**
  * Site no qual o preço será aplicado. Os possíveis sites são: 'EX', 'PF', 'CB', 'EH', 'BT', 'CD'. Caso nenhum valor seja informado, será assumido o valor 'EX' como padrão. Consulte a lista completa de sites disponíveis no serviço <a href='#!/sites' target='_blank'><strong>GET /sites</strong></a>
  */
  public $site; /* string */

  public function __construct(array $data = null) {
    $this->default = $data["default"];
    $this->offer = $data["offer"];
    $this->site = $data["site"];
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
