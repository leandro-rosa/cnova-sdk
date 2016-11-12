<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class SellerItemStatusUpdatingStatus implements ArrayAccess {
  static $swaggerTypes = array(
      'sku_seller_id' => 'string',
      'site' => 'string',
      'status' => 'string',
      'processed_at' => 'DateTime',
      'update_value' => 'string',
      'site_name' => 'string',
      'sku_site' => 'string',
      'errors' => 'array[Error]'
  );

  static $attributeMap = array(
      'sku_seller_id' => 'skuSellerId',
      'site' => 'site',
      'status' => 'status',
      'processed_at' => 'processedAt',
      'update_value' => 'updateValue',
      'site_name' => 'siteName',
      'sku_site' => 'skuSite',
      'errors' => 'errors'
  );

  
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Site de venda
  */
  public $site; /* string */
  /**
  * Status do produto
  */
  public $status; /* string */
  /**
  * Data do processamento
  */
  public $processed_at; /* DateTime */
  /**
  * Atualização
  */
  public $update_value; /* string */
  /**
  * Nome do site
  */
  public $site_name; /* string */
  /**
  * Sku do site
  */
  public $sku_site; /* string */
  /**
  * Lista de erros que ocorreram produto
  */
  public $errors; /* array[Error] */

  public function __construct(array $data = null) {
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->site = $data["site"];
    $this->status = $data["status"];
    $this->processed_at = $data["processed_at"];
    $this->update_value = $data["update_value"];
    $this->site_name = $data["site_name"];
    $this->sku_site = $data["sku_site"];
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
