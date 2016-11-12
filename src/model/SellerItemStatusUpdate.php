<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItemStatusUpdate implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'status' => 'array[SellerItemStatus]'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'status' => 'status'
  );

  
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Status do produto
  */
  public $status; /* array[SellerItemStatus] */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->status = $data["status"];
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
