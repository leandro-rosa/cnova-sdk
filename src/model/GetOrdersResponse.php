<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetOrdersResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'orders' => 'array[Order]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'orders' => 'orders',
      'metadata' => 'metadata'
  );

  
  public $orders; /* array[Order] */
  /**
  * Leia mais sobre os metadados retornados nas listagens em <a href='../apis/index.html#search' target='_blank'>Metadada</a>
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->orders = $data["orders"];
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
