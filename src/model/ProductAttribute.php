<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ProductAttribute implements ArrayAccess {
  static $swaggerTypes = array(
      'name' => 'string',
      'value' => 'string'
  );

  static $attributeMap = array(
      'name' => 'name',
      'value' => 'value'
  );

  
  /**
  * Nome do atributo
  */
  public $name; /* string */
  /**
  * Valor do atributo
  */
  public $value; /* string */

  public function __construct(array $data = null) {
    $this->name = $data["name"];
    $this->value = $data["value"];
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
