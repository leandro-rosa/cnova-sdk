<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ProductSiteReference implements ArrayAccess {
  static $swaggerTypes = array(
      'id' => 'string',
      'href' => 'string',
      'site' => 'string'
  );

  static $attributeMap = array(
      'id' => 'id',
      'href' => 'href',
      'site' => 'site'
  );

  
  /**
  * ID do produto
  */
  public $id; /* string */
  /**
  * Link do produto no site
  */
  public $href; /* string */
  /**
  * Site no qual o produto está disponível. Os possíveis sites são: 'EX', 'PF', 'CB', 'EH', 'BT', 'CD'. Consulte a lista completa de sites disponíveis no serviço <a href='#!/sites' target='_blank'><strong>GET /sites</strong></a>
  */
  public $site; /* string */

  public function __construct(array $data = null) {
    $this->id = $data["id"];
    $this->href = $data["href"];
    $this->site = $data["site"];
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
