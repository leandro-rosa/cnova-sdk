<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Phone implements ArrayAccess {
  static $swaggerTypes = array(
      'number' => 'string',
      'type' => 'string'
  );

  static $attributeMap = array(
      'number' => 'number',
      'type' => 'type'
  );

  
  /**
  * Número do telefone
  */
  public $number; /* string */
  /**
  * Tipo do telefone
  */
  public $type; /* string */

  public function __construct(array $data = null) {
    $this->number = $data["number"];
    $this->type = $data["type"];
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
