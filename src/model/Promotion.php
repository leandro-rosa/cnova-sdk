<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Promotion implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'name' => 'string',
      'amount' => 'double',
      'type' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'name' => 'name',
      'amount' => 'amount',
      'type' => 'type'
  );

  
  /**
  * ID da promoção que o produto foi adquirido
  */
  public $id; /* string */
  /**
  * Descrição da promoção
  */
  public $name; /* string */
  /**
  * Total de desconto
  */
  public $amount; /* double */
  /**
  * Tipo da promoção
  */
  public $type; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->amount = $data["amount"];
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
