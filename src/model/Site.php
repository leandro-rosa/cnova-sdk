<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Site implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'int',
      'name' => 'string',
      'mnemonic' => 'string',
      'url' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'name' => 'name',
      'mnemonic' => 'mnemonic',
      'url' => 'url'
  );

  
  /**
  * ID do site
  */
  public $id; /* int */
  /**
  * Nome do site
  */
  public $name; /* string */
  /**
  * Código que deverá ser utilizado nas operações que exigem o site. Exemplo: <code>GET /sellerItems?_offset=0&_limit=10&site=EX</code> para trazer produtos vendidos apenas no Extra
  */
  public $mnemonic; /* string */
  /**
  * URL base para consultar produtos nesse site
  */
  public $url; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->mnemonic = $data["mnemonic"];
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
