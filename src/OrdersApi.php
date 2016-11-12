<?php

namespace CNovaApiLojistaV2;

class OrdersApi {

  function __construct($apiClient = null) {
    if (null === $apiClient) {
      if (Configuration::$apiClient === null) {
        Configuration::$apiClient = new ApiClient(); // create a new API client if not present
        $this->apiClient = Configuration::$apiClient;
      }
      else
        $this->apiClient = Configuration::$apiClient; // use the default one
    } else {
      $this->apiClient = $apiClient; // use the one provided by the user
    }
  }

  private $apiClient; // instance of the ApiClient

  /**
   * get the API client
   */
  public function getApiClient() {
    return $this->apiClient;
  }

  /**
   * set the API client
   */
  public function setApiClient($apiClient) {
    $this->apiClient = $apiClient;
  }

  
  /**
   * getOrders
   *
   * Recupera detalhes de todos os pedidos
   *
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrders($_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrders');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrders');
      }
      

      // parse inputs
      $resourcePath = "/orders";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * postOrder
   *
   * Operação para criar um pedido
   *
   * @param OrderSandbox $order Objeto para criação do pedido. (required)
   * @return string
   */
   public function postOrder($order) {
      
      // verify the required parameter 'order' is set
      if ($order === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order when calling postOrder');
      }
      

      // parse inputs
      $resourcePath = "/orders";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      
      
      // body params
      $_tempBody = null;
      if (isset($order)) {
        $_tempBody = $order;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusApproved
   *
   * Recupera uma lista de pedidos Aprovados
   *
   * @param string $approved_at Data de aprovação. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;approvedAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;approvedAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;approvedAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusApproved($approved_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusApproved');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusApproved');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/approved";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($approved_at !== null) {
        $queryParams['approvedAt'] = $this->apiClient->toQueryValue($approved_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * putSellerItemsStatusApproved
   *
   * Operação para realizar a aprovação de um pedido (SANDBOX)
   *
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function putSellerItemsStatusApproved($order_id) {
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling putSellerItemsStatusApproved');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/approved/{orderId}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json; charset=utf-8'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusCanceled
   *
   * Retorna uma lista de pedidos Cancelados
   *
   * @param string $canceled_at Data de cancelemento. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;canceledAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;canceledAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;canceledAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusCanceled($canceled_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusCanceled');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusCanceled');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/canceled";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($canceled_at !== null) {
        $queryParams['canceledAt'] = $this->apiClient->toQueryValue($canceled_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusDelivered
   *
   * Recupera uma lista de pedidos Entregues
   *
   * @param string $delivered_at Data de entrega. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;deliveredAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;deliveredAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;deliveredAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusDelivered($delivered_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusDelivered');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusDelivered');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/delivered";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($delivered_at !== null) {
        $queryParams['deliveredAt'] = $this->apiClient->toQueryValue($delivered_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusNew
   *
   * Recupera uma lista de pedidos Novos
   *
   * @param string $purchased_at Data de compra. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersStatusNewResponse
   */
   public function getOrdersByStatusNew($purchased_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusNew');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusNew');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/new";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($purchased_at !== null) {
        $queryParams['purchasedAt'] = $this->apiClient->toQueryValue($purchased_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersStatusNewResponse');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusPartiallyDelivered
   *
   * Retorna uma lista de pedidos Parcialmente Entregues
   *
   * @param string $sent_at Data de envio. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusPartiallyDelivered($sent_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusPartiallyDelivered');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusPartiallyDelivered');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/partiallyDelivered";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($sent_at !== null) {
        $queryParams['sentAt'] = $this->apiClient->toQueryValue($sent_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusPartiallySent
   *
   * Retorna uma lista de pedidos Parcialmente Enviados
   *
   * @param string $sent_at Data de envio. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $customer_name Nome do Cliente. (required)
   * @param string $customer_document_number Documento do Cliente. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusPartiallySent($sent_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusPartiallySent');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusPartiallySent');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/partiallySent";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($sent_at !== null) {
        $queryParams['sentAt'] = $this->apiClient->toQueryValue($sent_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * getOrdersByStatusSent
   *
   * Recupera uma lista de pedidos Enviados
   *
   * @param string $sent_at Data de envio. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;sentAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas (required)
   * @param string $customer_name Nome do Cliente (required)
   * @param string $customer_document_number Documento do Cliente (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta (required)
   * @return GetOrdersResponse
   */
   public function getOrdersByStatusSent($sent_at, $customer_name, $customer_document_number, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersByStatusSent');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersByStatusSent');
      }
      

      // parse inputs
      $resourcePath = "/orders/status/sent";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($sent_at !== null) {
        $queryParams['sentAt'] = $this->apiClient->toQueryValue($sent_at);
      }// query params
      if($customer_name !== null) {
        $queryParams['customer.name'] = $this->apiClient->toQueryValue($customer_name);
      }// query params
      if($customer_document_number !== null) {
        $queryParams['customer.documentNumber'] = $this->apiClient->toQueryValue($customer_document_number);
      }// query params
      if($_offset !== null) {
        $queryParams['_offset'] = $this->apiClient->toQueryValue($_offset);
      }// query params
      if($_limit !== null) {
        $queryParams['_limit'] = $this->apiClient->toQueryValue($_limit);
      }
      
      
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersResponse');
      return $responseObject;
  }
  
  /**
   * getOrderById
   *
   * Recupera detalhes do pedido informado
   *
   * @param string $order_id ID do pedido. (required)
   * @return Order
   */
   public function getOrderById($order_id) {
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling getOrderById');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'Order');
      return $responseObject;
  }
  
  /**
   * getOrderByIdAndSkuSllerId
   *
   * Recupera detalhes de um item específico do pedido
   *
   * @param string $order_id ID do pedido. (required)
   * @param string $sku_seller_id SKU Seller ID do item de pedido. (required)
   * @return OrderItem
   */
   public function getOrderByIdAndSkuSllerId($order_id, $sku_seller_id) {
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling getOrderByIdAndSkuSllerId');
      }
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling getOrderByIdAndSkuSllerId');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/items/{skuSellerId}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }// path params
      if($sku_seller_id !== null) {
        $resourcePath = str_replace("{" . "skuSellerId" . "}",
                                    $this->apiClient->toPathValue($sku_seller_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'OrderItem');
      return $responseObject;
  }
  
  /**
   * postOrderTrackingCancelation
   *
   * Operação para confirmar o cancelamento de um item de pedido
   *
   * @param NewTracking $body  (required)
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function postOrderTrackingCancelation($body, $order_id) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling postOrderTrackingCancelation');
      }
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postOrderTrackingCancelation');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/trackings/cancel";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * postOrderTrackingDelivered
   *
   * Registra uma nova operação de tracking de entrega
   *
   * @param NewTracking $body  (required)
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function postOrderTrackingDelivered($body, $order_id) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling postOrderTrackingDelivered');
      }
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postOrderTrackingDelivered');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/trackings/delivered";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * postOrderTrackingExchange
   *
   * Operação para confirmar a troca de um item de um pedido
   *
   * @param NewTracking $body  (required)
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function postOrderTrackingExchange($body, $order_id) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling postOrderTrackingExchange');
      }
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postOrderTrackingExchange');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/trackings/exchange";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * postOrderTrackingReturn
   *
   * Operação para confirmar devolução (reembolso) de item do pedido
   *
   * @param NewTracking $body  (required)
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function postOrderTrackingReturn($body, $order_id) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling postOrderTrackingReturn');
      }
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postOrderTrackingReturn');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/trackings/return";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  
  /**
   * postOrderTrackingSent
   *
   * Registra uma nova operação de tracking de envio
   *
   * @param NewTracking $body  (required)
   * @param string $order_id ID do pedido. (required)
   * @return string
   */
   public function postOrderTrackingSent($body, $order_id) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling postOrderTrackingSent');
      }
      
      // verify the required parameter 'order_id' is set
      if ($order_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postOrderTrackingSent');
      }
      

      // parse inputs
      $resourcePath = "/orders/{orderId}/trackings/sent";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
      if($order_id !== null) {
        $resourcePath = str_replace("{" . "orderId" . "}",
                                    $this->apiClient->toPathValue($order_id), $resourcePath);
      }
      
      // body params
      $_tempBody = null;
      if (isset($body)) {
        $_tempBody = $body;
      }

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array('client_id', 'access_token');

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'string');
      return $responseObject;
  }
  

}
