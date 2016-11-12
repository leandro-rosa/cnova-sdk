<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderTrackingUpdatingStatus implements ArrayAccess {
  static $swaggerTypes = array(
      'order' => 'OrderReference',
      'items' => 'array[OrderItemReference]',
      'status' => 'string',
      'processed_at' => 'DateTime',
      'errors' => 'array[Error]'
  );

  static $attributeMap = array(
      'order' => 'order',
      'items' => 'items',
      'status' => 'status',
      'processed_at' => 'processedAt',
      'errors' => 'errors'
  );

  
  /**
  * Dados do pedido
  */
  public $order; /* OrderReference */
  /**
  * Items do pedido
  */
  public $items; /* array[OrderItemReference] */
  /**
  * Status do pedido
  */
  public $status; /* string */
  /**
  * Data do processamento
  */
  public $processed_at; /* DateTime */
  /**
  * Erros do envido de pedidos
  */
  public $errors; /* array[Error] */

  public function __construct(array $data = null) {
    $this->order = $data["order"];
    $this->items = $data["items"];
    $this->status = $data["status"];
    $this->processed_at = $data["processed_at"];
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
