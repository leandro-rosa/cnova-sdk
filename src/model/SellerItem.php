<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItem implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'sku_site_id' => 'string',
      'title' => 'string',
      'brand' => 'string',
      'gtin' => 'array[string]',
      'status' => 'array[SellerItemStatus]',
      'prices' => 'array[Prices]',
      'stocks' => 'array[ControlledStock]',
      'urls' => 'array[ProductSiteReference]',
      'images' => 'array[Image]',
      'product' => 'ProductReference',
      'dimensions' => 'Dimensions',
      'gift_wrap' => 'GiftWrap',
      'attributes' => 'array[ProductAttribute]'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'sku_site_id' => 'skuSiteId',
      'title' => 'title',
      'brand' => 'brand',
      'gtin' => 'gtin',
      'status' => 'status',
      'prices' => 'prices',
      'stocks' => 'stocks',
      'urls' => 'urls',
      'images' => 'images',
      'product' => 'product',
      'dimensions' => 'dimensions',
      'gift_wrap' => 'giftWrap',
      'attributes' => 'attributes'
  );

  
  /**
  * SKU ID do produto do Lojista
  */
  public $sku_seller_id; /* string */
  /**
  * SKU Id do produto do Extra.
  */
  public $sku_site_id; /* string */
  /**
  * Título de venda do produto no Marketplace. Ex Televisor de LCD Sony Bravia 40...
  */
  public $title; /* string */
  /**
  * Marca do produto. Ex Sony
  */
  public $brand; /* string */
  /**
  * Lista que pode conter tanto o código EAN do produto (código de barras) quanto códigos ISBN (geralmente utilizados para livros)
  */
  public $gtin; /* array[string] */
  /**
  * Status do produto para cada site
  */
  public $status; /* array[SellerItemStatus] */
  /**
  * Informações de preço de venda do produto para cada site
  */
  public $prices; /* array[Prices] */
  /**
  * Informações de estoque do produto para cada site
  */
  public $stocks; /* array[ControlledStock] */
  /**
  * Lista de urls do produto para cada site no qual o mesmo está disponível
  */
  public $urls; /* array[ProductSiteReference] */
  /**
  * Lista de imagens do produto
  */
  public $images; /* array[Image] */
  /**
  * Informações do catálogo de produtos
  */
  public $product; /* ProductReference */
  /**
  * Informações de dimensões do produto
  */
  public $dimensions; /* Dimensions */
  /**
  * Informações de embrulho para presente
  */
  public $gift_wrap; /* GiftWrap */
  /**
  * Características do produto
  */
  public $attributes; /* array[ProductAttribute] */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->sku_site_id = $data["sku_site_id"];
    $this->title = $data["title"];
    $this->brand = $data["brand"];
    $this->gtin = $data["gtin"];
    $this->status = $data["status"];
    $this->prices = $data["prices"];
    $this->stocks = $data["stocks"];
    $this->urls = $data["urls"];
    $this->images = $data["images"];
    $this->product = $data["product"];
    $this->dimensions = $data["dimensions"];
    $this->gift_wrap = $data["gift_wrap"];
    $this->attributes = $data["attributes"];
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
