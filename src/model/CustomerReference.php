<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class CustomerReference implements ArrayAccess {
  static $swaggerTypes = array(
      'name' => 'string',
      'phone_number' => 'string'
  );

  static $attributeMap = array(
      'name' => 'name',
      'phone_number' => 'phoneNumber'
  );

  
  /**
  * Nome do cliente
  */
  public $name; /* string */
  /**
  * Telefone do cliente
  */
  public $phone_number; /* string */

  public function __construct(array $data = null) {
    $this->name = $data["name"];
    $this->phone_number = $data["phone_number"];
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
