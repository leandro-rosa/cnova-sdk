<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class OrderItem implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'sku_seller_id' => 'string',
      'name' => 'string',
      'sale_price' => 'double',
      'sent' => 'boolean',
      'freight' => 'Freight',
      'gift_wrap' => 'OrderGiftWrap',
      'promotions' => 'array[Promotion]'
  );

  static $attributeMap = array(
      'id' => 'id',
      'sku_seller_id' => 'skuSellerId',
      'name' => 'name',
      'sale_price' => 'salePrice',
      'sent' => 'sent',
      'freight' => 'freight',
      'gift_wrap' => 'giftWrap',
      'promotions' => 'promotions'
  );

  
  /**
  * ID do item de Pedido
  */
  public $id; /* string */
  /**
  * SKU ID do produto do Lojista
  */
  public $sku_seller_id; /* string */
  /**
  * Nome do produto
  */
  public $name; /* string */
  /**
  * Preço de venda unitário
  */
  public $sale_price; /* double */
  /**
  * Flag que indica se o produto já foi enviado
  */
  public $sent; /* boolean */
  /**
  * Informações sobre o frete do produto
  */
  public $freight; /* Freight */
  /**
  * Informações de embrulho para presente
  */
  public $gift_wrap; /* OrderGiftWrap */
  /**
  * Lista de Promoções
  */
  public $promotions; /* array[Promotion] */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->name = $data["name"];
    $this->sale_price = $data["sale_price"];
    $this->sent = $data["sent"];
    $this->freight = $data["freight"];
    $this->gift_wrap = $data["gift_wrap"];
    $this->promotions = $data["promotions"];
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
