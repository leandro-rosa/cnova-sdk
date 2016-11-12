<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderId implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'int'
  );

  static $attributeMap = array(
      'id' => 'id'
  );

  
  /**
  * ID do pedido.
  */
  public $id; /* int */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
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
