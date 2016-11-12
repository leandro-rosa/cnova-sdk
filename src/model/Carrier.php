<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Carrier implements ArrayAccess {
  static $swaggerTypes = array(
      'name' => 'string',
      'cnpj' => 'string'
  );

  static $attributeMap = array(
      'name' => 'name',
      'cnpj' => 'cnpj'
  );

  
  /**
  * Nome da transportadora
  */
  public $name; /* string */
  /**
  * CNPJ da transportadora
  */
  public $cnpj; /* string */

  public function __construct(array $data = null) {
    $this->name = $data["name"];
    $this->cnpj = $data["cnpj"];
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
