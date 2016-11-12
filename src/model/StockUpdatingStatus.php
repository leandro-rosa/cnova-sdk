<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class StockUpdatingStatus implements ArrayAccess {
  static $swaggerTypes = array(
      'warehouse' => 'int',
      'sku_seller_id' => 'string',
      'status' => 'string',
      'processed_at' => 'DateTime',
      'update_value' => 'double',
      'refer' => 'string',
      'sku_site' => 'string',
      'site_list' => 'array[string]',
      'errors' => 'array[Error]'
  );

  static $attributeMap = array(
      'warehouse' => 'warehouse',
      'sku_seller_id' => 'skuSellerId',
      'status' => 'status',
      'processed_at' => 'processedAt',
      'update_value' => 'updateValue',
      'refer' => 'refer',
      'sku_site' => 'skuSite',
      'site_list' => 'siteList',
      'errors' => 'errors'
  );

  
  /**
  * Localização fisica do estoque
  */
  public $warehouse; /* int */
  /**
  * SKU do produto do lojista que deverá ser alterado
  */
  public $sku_seller_id; /* string */
  /**
  * Status da solicitação de atualização
  */
  public $status; /* string */
  /**
  * Data do processamento
  */
  public $processed_at; /* DateTime */
  /**
  * Valor de atualização
  */
  public $update_value; /* double */
  /**
  * Arquivo de referência da atualização
  */
  public $refer; /* string */
  /**
  * SKU do site onde o estoque será atualizado
  */
  public $sku_site; /* string */
  public $site_list; /* array[string] */
  /**
  * Erros do pedido
  */
  public $errors; /* array[Error] */

  public function __construct(array $data = null) {
    $this->warehouse = $data["warehouse"];
    $this->sku_seller_id = $data["sku_seller_id"];
    $this->status = $data["status"];
    $this->processed_at = $data["processed_at"];
    $this->update_value = $data["update_value"];
    $this->refer = $data["refer"];
    $this->sku_site = $data["sku_site"];
    $this->site_list = $data["site_list"];
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
