<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ProductLoadStock implements ArrayAccess {
  static $swaggerTypes = array(
      'quantity' => 'int',
      'cross_docking_time' => 'int'
  );

  static $attributeMap = array(
      'quantity' => 'quantity',
      'cross_docking_time' => 'crossDockingTime'
  );

  
  /**
  * Quantidade de produtos disponíveis
  */
  public $quantity; /* int */
  /**
  * Tempo de preparação/fabricação do produto em dias. Esse tempo é incluído no cálculo de frete
  */
  public $cross_docking_time; /* int */

  public function __construct(array $data = null) {
    $this->quantity = $data["quantity"];
    $this->cross_docking_time = $data["cross_docking_time"];
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
