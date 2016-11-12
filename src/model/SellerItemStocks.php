<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItemStocks implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'stocks' => 'array[Stock]'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'stocks' => 'stocks'
  );

  
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Estoque do produto
  */
  public $stocks; /* array[Stock] */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->stocks = $data["stocks"];
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
