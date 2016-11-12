<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetSitesResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'total_rows' => 'int',
      'sites' => 'array[Site]'
  );

  static $attributeMap = array(
      'total_rows' => 'totalRows',
      'sites' => 'sites'
  );

  
  public $total_rows; /* int */
  public $sites; /* array[Site] */

  public function __construct(array $data = null) {
    $this->total_rows = $data["total_rows"];
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
