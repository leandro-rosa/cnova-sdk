<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Product implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_id' => 'string',
      'sku_seller_id' => 'string',
      'product_seller_id' => 'string',
      'title' => 'string',
      'description' => 'string',
      'brand' => 'string',
      'gtin' => 'array[string]',
      'categories' => 'array[string]',
      'images' => 'array[string]',
      'videos' => 'array[string]',
      'price' => 'ProductLoadPrices',
      'stock' => 'ProductLoadStock',
      'dimensions' => 'Dimensions',
      'gift_wrap' => 'GiftWrap',
      'attributes' => 'array[ProductAttribute]'
  );

  static $attributeMap = array(
      'sku_id' => 'skuId',
      'sku_seller_id' => 'skuSellerId',
      'product_seller_id' => 'productSellerId',
      'title' => 'title',
      'description' => 'description',
      'brand' => 'brand',
      'gtin' => 'gtin',
      'categories' => 'categories',
      'images' => 'images',
      'videos' => 'videos',
      'price' => 'price',
      'stock' => 'stock',
      'dimensions' => 'dimensions',
      'gift_wrap' => 'giftWrap',
      'attributes' => 'attributes'
  );

  
  /**
  * SKU ID do produto no Marketplace - utilizado para realizar associação de produtos
  */
  public $sku_id; /* string */
  /**
  * SKU ID do produto do Lojista
  */
  public $sku_seller_id; /* string */
  /**
  * ID do produto do lojista para fazer o agrupamento de SKUs
  */
  public $product_seller_id; /* string */
  /**
  * Nome no Marketplace. Ex Televisor de LCD Sony Bravia 40...
  */
  public $title; /* string */
  /**
  * Descrição do produto. Aceita tags HTML para formatar a apresentação da descrição, no entanto há algumas tags restritas (tags para acesso a conteúdo externo): img, object, script e iframe.
  */
  public $description; /* string */
  /**
  * Marca. Ex Sony
  */
  public $brand; /* string */
  /**
  * Lista que pode conter tanto o código EAN do produto (código de barras) quanto códigos ISBN (geralmente utilizados para livros)
  */
  public $gtin; /* array[string] */
  /**
  * Lista de categorias
  */
  public $categories; /* array[string] */
  /**
  *  Lista de URLs de imagens. Pelo menos uma imagem precisa ser informada
  */
  public $images; /* array[string] */
  /**
  *  Lista de URLs de vídeos
  */
  public $videos; /* array[string] */
  /**
  * Informações de preço do produto
  */
  public $price; /* ProductLoadPrices */
  /**
  * Informações de estoque do produto
  */
  public $stock; /* ProductLoadStock */
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
    $this->sku_id = $data["sku_id"];
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->product_seller_id = $data["product_seller_id"];
    $this->title = $data["title"];
    $this->description = $data["description"];
    $this->brand = $data["brand"];
    $this->gtin = $data["gtin"];
    $this->categories = $data["categories"];
    $this->images = $data["images"];
    $this->videos = $data["videos"];
    $this->price = $data["price"];
    $this->stock = $data["stock"];
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
