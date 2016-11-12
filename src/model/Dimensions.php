<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Dimensions implements ArrayAccess {
  static $swaggerTypes = array(
      'weight' => 'double',
      'length' => 'double',
      'width' => 'double',
      'height' => 'double'
  );

  static $attributeMap = array(
      'weight' => 'weight',
      'length' => 'length',
      'width' => 'width',
      'height' => 'height'
  );

  
  /**
  * Peso do produto, em quilos. Não pode ser 0 (zero) e deve ter no máximo duas casas decimais
  */
  public $weight; /* double */
  /**
  * Comprimento do produto, em metros. Não pode ser 0 (zero) e deve ter no máximo duas casas decimais
  */
  public $length; /* double */
  /**
  * Largura do produto, em metros. Não pode ser 0 (zero) e deve ter no máximo duas casas decimais
  */
  public $width; /* double */
  /**
  * Altura do produto, em metros. Não pode ser 0 (zero) e deve ter no máximo duas casas decimais
  */
  public $height; /* double */

  public function __construct(array $data = null) {
    $this->weight = $data["weight"];
    $this->length = $data["length"];
    $this->width = $data["width"];
    $this->height = $data["height"];
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
