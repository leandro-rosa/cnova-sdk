<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderItemSandbox implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'name' => 'string',
      'sale_price' => 'double',
      'quantity' => 'int'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'name' => 'name',
      'sale_price' => 'salePrice',
      'quantity' => 'quantity'
  );

  
  /**
  * SKU ID do produto do Lojista
  */
  public $sku_seller_id; /* string */
  /**
  * Nome do produto
  */
  public $name; /* string */
  /**
  * Preço de venda
  */
  public $sale_price; /* double */
  /**
  * Quantidade produtos
  */
  public $quantity; /* int */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->name = $data["name"];
    $this->sale_price = $data["sale_price"];
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
