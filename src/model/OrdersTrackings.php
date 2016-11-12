<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrdersTrackings implements ArrayAccess {
  static $swaggerTypes = array(
      'trackings' => 'array[OrderTracking]'
  );

  static $attributeMap = array(
      'trackings' => 'trackings'
  );

  
  /**
  * Lista de trackings
  */
  public $trackings; /* array[OrderTracking] */

  public function __construct(array $data = null) {
    $this->trackings = $data["trackings"];
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
