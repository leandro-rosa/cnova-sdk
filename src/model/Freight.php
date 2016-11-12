<?php


namespace CNovaApiLojistaV2\model;

use \ArrayAccess;

class Freight implements ArrayAccess {
  static $swaggerTypes = array(
      'actual_amount' => 'double',
      'charged_amount' => 'double',
      'transit_time' => 'int',
      'cross_docking_time' => 'int',
      'additional_info' => 'string',
      'type' => 'string',
      'scheduled_at' => 'DateTime',
      'scheduled_period' => 'string'
  );

  static $attributeMap = array(
      'actual_amount' => 'actualAmount',
      'charged_amount' => 'chargedAmount',
      'transit_time' => 'transitTime',
      'cross_docking_time' => 'crossDockingTime',
      'additional_info' => 'additionalInfo',
      'type' => 'type',
      'scheduled_at' => 'scheduledAt',
      'scheduled_period' => 'scheduledPeriod'
  );

  
  /**
  * Valor nominal do frete (sem descontos e abatimentos, com margem comercial)
  */
  public $actual_amount; /* double */
  /**
  * Valor cobrado pelo frete
  */
  public $charged_amount; /* double */
  /**
  * Prazo de transporte para entrega do produto em dias úteis
  */
  public $transit_time; /* int */
  /**
  * Tempo de preparação/fabricação do produto em dias. Esse tempo é incluído no cálculo de frete.
  */
  public $cross_docking_time; /* int */
  /**
  * Informações adicionais sobre a entrega. Pode ser utilizado para informar o nome da transportadora, por exemplo
  */
  public $additional_info; /* string */
  /**
  * Tipo de frete
  */
  public $type; /* string */
  /**
  * Data de agendamento da entrega
  */
  public $scheduled_at; /* DateTime */
  /**
  * Período que a entrega foi agendada
  */
  public $scheduled_period; /* string */

  public function __construct(array $data = null) {
    $this->actual_amount = $data["actual_amount"];
    $this->charged_amount = $data["charged_amount"];
    $this->transit_time = $data["transit_time"];
    $this->cross_docking_time = $data["cross_docking_time"];
    $this->additional_info = $data["additional_info"];
    $this->type = $data["type"];
    $this->scheduled_at = $data["scheduled_at"];
    $this->scheduled_period = $data["scheduled_period"];
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
