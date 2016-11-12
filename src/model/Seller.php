<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Seller implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'name' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'name' => 'name'
  );

  
  /**
  * ID do produto
  */
  public $id; /* string */
  /**
  * Nome do produto
  */
  public $name; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->name = $data["name"];
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
