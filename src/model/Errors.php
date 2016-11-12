<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Errors implements ArrayAccess {
  static $swaggerTypes = array(
      'errors' => 'array[Error]'
  );

  static $attributeMap = array(
      'errors' => 'errors'
  );

  
  /**
  * Lista contendo os skus que não puderam ser cancelado e o erro para cada um
  */
  public $errors; /* array[Error] */

  public function __construct(array $data = null) {
    $this->errors = $data["errors"];
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
