<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetWarehousesResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'warehouses' => 'array[Warehouse]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'warehouses' => 'warehouses',
      'metadata' => 'metadata'
  );

  
  public $warehouses; /* array[Warehouse] */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->warehouses = $data["warehouses"];
    $this->metadata = $data["metadata"];
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
