<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Stock implements ArrayAccess {
  static $swaggerTypes = array(
      'quantity' => 'int',
      'cross_docking_time' => 'int',
      'warehouse' => 'int'
  );

  static $attributeMap = array(
      'quantity' => 'quantity',
      'cross_docking_time' => 'crossDockingTime',
      'warehouse' => 'warehouse'
  );

  
  /**
  * Quantidade de produtos disponíveis
  */
  public $quantity; /* int */
  /**
  * Tempo de preparação/fabricação do produto em dias. Esse tempo é incluído no cálculo de frete
  */
  public $cross_docking_time; /* int */
  /**
  * ID do depósito no qual o estoque do produto está sendo considerado. Consulte a lista completa de warehouses disponíveis no serviço <a href='#!/warehouses' target='_blank'><strong>GET /warehouses</strong></a>
  */
  public $warehouse; /* int */

  public function __construct(array $data = null) {
    $this->quantity = $data["quantity"];
    $this->cross_docking_time = $data["cross_docking_time"];
    $this->warehouse = $data["warehouse"];
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
