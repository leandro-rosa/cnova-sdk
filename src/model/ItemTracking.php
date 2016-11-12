<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ItemTracking implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'href' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'href' => 'href'
  );

  
  /**
  * Order Item ID do produto vendido
  */
  public $id; /* string */
  /**
  * Link para acesso ao item
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
