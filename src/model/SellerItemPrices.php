<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItemPrices implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'prices' => 'array[Prices]'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'prices' => 'prices'
  );

  
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Preço do produto
  */
  public $prices; /* array[Prices] */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->prices = $data["prices"];
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
