<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ProductResponseItem implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller' => 'SellerItemReference',
      'status' => 'string',
      'created_at' => 'DateTime'
  );

  static $attributeMap = array(
      'sku_seller' => 'skuSeller',
      'status' => 'status',
      'created_at' => 'createdAt'
  );

  
  /**
  * SKU do produto do Lojista
  */
  public $sku_seller; /* SellerItemReference */
  /**
  * Status do produto
  */
  public $status; /* string */
  /**
  * Data de envio do produto
  */
  public $created_at; /* DateTime */

  public function __construct(array $data = null) {
    $this->sku_seller = $data["sku_seller"];
    $this->status = $data["status"];
    $this->created_at = $data["created_at"];
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
