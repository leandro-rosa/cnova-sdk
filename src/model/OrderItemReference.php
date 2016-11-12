<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderItemReference implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'quantity' => 'int'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'quantity' => 'quantity'
  );

  
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Quantidade do estoque
  */
  public $quantity; /* int */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->quantity = $data["quantity"];
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
