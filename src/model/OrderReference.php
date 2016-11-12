<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderReference implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'int',
      'href' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'href' => 'href'
  );

  
  /**
  * ID do pedido.
  */
  public $id; /* int */
  /**
  * URL de consulta da ordem por ID.
  */
  public $href; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->href = $data["href"];
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
