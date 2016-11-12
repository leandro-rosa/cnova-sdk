<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Error implements ArrayAccess {
  static $swaggerTypes = array(
      'code' => 'string',
      'http_status' => 'string',
      'type' => 'string',
      'message' => 'string',
      'sku_seller_id' => 'string'
  );

  static $attributeMap = array(
      'code' => 'code',
      'http_status' => 'httpStatus',
      'type' => 'type',
      'message' => 'message',
      'sku_seller_id' => 'skuSellerId'
  );

  
  /**
  * Código de retorno da aplicação
  */
  public $code; /* string */
  /**
  * Código de retorno do protocólo HTTP
  */
  public $http_status; /* string */
  /**
  * Tipo do erro
  */
  public $type; /* string */
  /**
  * Descrição do erro
  */
  public $message; /* string */
  /**
  * Identificador do seller item que originou o problema
  */
  public $sku_seller_id; /* string */

  public function __construct(array $data = null) {
    $this->code = $data["code"];
    $this->http_status = $data["http_status"];
    $this->type = $data["type"];
    $this->message = $data["message"];
    $this->sku_seller_id = $data["sku_seller_id"];
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
