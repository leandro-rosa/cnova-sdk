<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ProductLoadPrices implements ArrayAccess {
  static $swaggerTypes = array(
      'default' => 'double',
      'offer' => 'double'
  );

  static $attributeMap = array(
      'default' => 'default',
      'offer' => 'offer'
  );

  
  /**
  * Preço de do produto no Marketplace
  */
  public $default; /* double */
  /**
  * Preço real de venda. Preço por do produto no Marketplace
  */
  public $offer; /* double */

  public function __construct(array $data = null) {
    $this->default = $data["default"];
    $this->offer = $data["offer"];
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
