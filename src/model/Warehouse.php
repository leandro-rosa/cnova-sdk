<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Warehouse implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'int',
      'sites' => 'array[string]'
  );

  static $attributeMap = array(
      'id' => 'id',
      'sites' => 'sites'
  );

  
  /**
  * ID do warehouse. Ele deve ser utilizado nas atualizações de estoque dos produtos.
  */
  public $id; /* int */
  /**
  * Lista de sites que esse warehouse atende.
  */
  public $sites; /* array[string] */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->sites = $data["sites"];
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
