<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class ShippingAddress implements ArrayAccess {
  static $swaggerTypes = array(
      'address' => 'string',
      'number' => 'string',
      'complement' => 'string',
      'quarter' => 'string',
      'reference' => 'string',
      'city' => 'string',
      'state' => 'string',
      'country_id' => 'string',
      'zip_code' => 'string',
      'recipient_name' => 'string'
  );

  static $attributeMap = array(
      'address' => 'address',
      'number' => 'number',
      'complement' => 'complement',
      'quarter' => 'quarter',
      'reference' => 'reference',
      'city' => 'city',
      'state' => 'state',
      'country_id' => 'countryId',
      'zip_code' => 'zipCode',
      'recipient_name' => 'recipientName'
  );

  
  /**
  * Endereço (nome da rua, avenida ... )
  */
  public $address; /* string */
  /**
  * Número do endereço
  */
  public $number; /* string */
  /**
  * Informações adicionais
  */
  public $complement; /* string */
  /**
  * Bairro
  */
  public $quarter; /* string */
  /**
  * Pontos de referência
  */
  public $reference; /* string */
  /**
  * Cidade
  */
  public $city; /* string */
  /**
  * Estado
  */
  public $state; /* string */
  /**
  * Identificação do País. Baseado na ISO-3166, padrão alpha 2. Ex.: BR, US, AR
  */
  public $country_id; /* string */
  /**
  * Código de Endereçamento Postal - CEP
  */
  public $zip_code; /* string */
  /**
  * Nome do destinatario
  */
  public $recipient_name; /* string */

  public function __construct(array $data = null) {
    $this->address = $data["address"];
    $this->number = $data["number"];
    $this->complement = $data["complement"];
    $this->quarter = $data["quarter"];
    $this->reference = $data["reference"];
    $this->city = $data["city"];
    $this->state = $data["state"];
    $this->country_id = $data["country_id"];
    $this->zip_code = $data["zip_code"];
    $this->recipient_name = $data["recipient_name"];
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
