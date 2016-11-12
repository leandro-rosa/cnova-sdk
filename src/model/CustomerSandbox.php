<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class CustomerSandbox implements ArrayAccess {
  static $swaggerTypes = array(
      'name' => 'string',
      'gender' => 'string',
      'document_number' => 'string',
      'type' => 'string',
      'email' => 'string',
      'born_at' => 'DateTime',
      'billing' => 'BillingAddress',
      'phones' => 'PhonesSandbox'
  );

  static $attributeMap = array(
      'name' => 'name',
      'gender' => 'gender',
      'document_number' => 'documentNumber',
      'type' => 'type',
      'email' => 'email',
      'born_at' => 'bornAt',
      'billing' => 'billing',
      'phones' => 'phones'
  );

  
  /**
  * Nome do cliente
  */
  public $name; /* string */
  /**
  * Sexo - Masculino ou Feminino
  */
  public $gender; /* string */
  /**
  * Número de documento do cliente
  */
  public $document_number; /* string */
  /**
  * Tipo de cliente (Pessoa Física / Jurídica)
  */
  public $type; /* string */
  /**
  * Email do cliente
  */
  public $email; /* string */
  /**
  * Data de nascimento
  */
  public $born_at; /* DateTime */
  /**
  * Endereço do cliente
  */
  public $billing; /* BillingAddress */
  /**
  * Telefones do cliente
  */
  public $phones; /* PhonesSandbox */

  public function __construct(array $data = null) {
    $this->name = $data["name"];
    $this->gender = $data["gender"];
    $this->document_number = $data["document_number"];
    $this->type = $data["type"];
    $this->email = $data["email"];
    $this->born_at = $data["born_at"];
    $this->billing = $data["billing"];
    $this->phones = $data["phones"];
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
