<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Image implements ArrayAccess {
  static $swaggerTypes = array(
      'type' => 'string',
      'main' => 'boolean',
      'url' => 'string'
  );

  static $attributeMap = array(
      'type' => 'type',
      'main' => 'main',
      'url' => 'url'
  );

  
  /**
  * Formato da imagem
  */
  public $type; /* string */
  /**
  * Flag que indica se a imagem é a principal
  */
  public $main; /* boolean */
  /**
  * URL da imagem do produto
  */
  public $url; /* string */

  public function __construct(array $data = null) {
    $this->type = $data["type"];
    $this->main = $data["main"];
    $this->url = $data["url"];
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
