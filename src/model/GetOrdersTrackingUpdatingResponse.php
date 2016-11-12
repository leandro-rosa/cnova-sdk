<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class GetOrdersTrackingUpdatingResponse implements ArrayAccess {
  static $swaggerTypes = array(
      'trackings' => 'array[OrderTrackingUpdatingStatus]',
      'metadata' => 'array[MetadataEntry]'
  );

  static $attributeMap = array(
      'trackings' => 'trackings',
      'metadata' => 'metadata'
  );

  
  /**
  * Informações de tracking do pedido
  */
  public $trackings; /* array[OrderTrackingUpdatingStatus] */
  /**
  * Dados adicionais da consulta
  */
  public $metadata; /* array[MetadataEntry] */

  public function __construct(array $data = null) {
    $this->trackings = $data["trackings"];
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
