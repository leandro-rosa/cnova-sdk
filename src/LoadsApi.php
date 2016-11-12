<?php

namespace CNovaApiLojistaV2;

class LoadsApi {

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
   * getOrdersTrackingDelivered
   *
   * Operação utilizada para consultar o status dos produtos enviados
   *
   * @param string $created_at Data de envio do produto. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $status Status do produto importado. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0) (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta (required)
   * @return GetOrdersTrackingUpdatingResponse
   */
   public function getOrdersTrackingDelivered($created_at, $status, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersTrackingDelivered');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersTrackingDelivered');
      }
      

      // parse inputs
      $resourcePath = "/loads/orders/trackings/delivered";
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
      if($created_at !== null) {
        $queryParams['createdAt'] = $this->apiClient->toQueryValue($created_at);
      }// query params
      if($status !== null) {
        $queryParams['status'] = $this->apiClient->toQueryValue($status);
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

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersTrackingUpdatingResponse');
      return $responseObject;
  }
  
  /**
   * postOrdersTrackingDelivered
   *
   * Operação utilizada  para atualização de tracking massivo
   *
   * @param OrdersTrackings $orders_trackings Arquivo em formato &lt;strong&gt;JSON&lt;/strong&gt; cujo conteúdo contêm uma lista de objetos product. (required)
   * @return string
   */
   public function postOrdersTrackingDelivered($orders_trackings) {
      
      // verify the required parameter 'orders_trackings' is set
      if ($orders_trackings === null) {
        throw new \InvalidArgumentException('Missing the required parameter $orders_trackings when calling postOrdersTrackingDelivered');
      }
      

      // parse inputs
      $resourcePath = "/loads/orders/trackings/delivered";
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
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      
      
      // body params
      $_tempBody = null;
      if (isset($orders_trackings)) {
        $_tempBody = $orders_trackings;
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
   * getOrdersTrackingSent
   *
   * Operação utilizada para consultar o status dos produtos enviados
   *
   * @param string $created_at Data de envio do produto. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $status Status do produto importado. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetOrdersTrackingUpdatingResponse
   */
   public function getOrdersTrackingSent($created_at, $status, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getOrdersTrackingSent');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getOrdersTrackingSent');
      }
      

      // parse inputs
      $resourcePath = "/loads/orders/trackings/sent";
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
      if($created_at !== null) {
        $queryParams['createdAt'] = $this->apiClient->toQueryValue($created_at);
      }// query params
      if($status !== null) {
        $queryParams['status'] = $this->apiClient->toQueryValue($status);
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

      $responseObject = $this->apiClient->deserialize($response,'GetOrdersTrackingUpdatingResponse');
      return $responseObject;
  }
  
  /**
   * postOrdersTrackingSent
   *
   * Operação utilizada para atualização de tracking massivo
   *
   * @param OrdersTrackings $orders_trackings Arquivo em formato &lt;strong&gt;JSON&lt;/strong&gt; cujo conteúdo contêm uma lista de objetos de order tracking. (required)
   * @return string
   */
   public function postOrdersTrackingSent($orders_trackings) {
      
      // verify the required parameter 'orders_trackings' is set
      if ($orders_trackings === null) {
        throw new \InvalidArgumentException('Missing the required parameter $orders_trackings when calling postOrdersTrackingSent');
      }
      

      // parse inputs
      $resourcePath = "/loads/orders/trackings/sent";
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
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      
      
      // body params
      $_tempBody = null;
      if (isset($orders_trackings)) {
        $_tempBody = $orders_trackings;
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
   * getProducts
   *
   * Operação utilizada para consultar o status dos produtos
   *
   * @param string $created_at Data de envio do produto. Esse campo aceita um range de datas separados por vírgula, e os formatos aceitos para o campo são os seguintes:&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},{data final}&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt={data inicial},*&lt;/strong&gt;&lt;br/&gt;&lt;strong&gt;purchasedAt=*,{data final}&lt;/strong&gt;&lt;br/&gt;onde, o &lt;strong&gt;*&lt;/strong&gt; é obrigatório e indica a que todas as datas antes ou depois da outra data passada devem ser consideradas. (required)
   * @param string $status Status do produto importado. (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetProductsResponse
   */
   public function getProducts($created_at, $status, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getProducts');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getProducts');
      }
      

      // parse inputs
      $resourcePath = "/loads/products";
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
      if($created_at !== null) {
        $queryParams['createdAt'] = $this->apiClient->toQueryValue($created_at);
      }// query params
      if($status !== null) {
        $queryParams['status'] = $this->apiClient->toQueryValue($status);
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

      $responseObject = $this->apiClient->deserialize($response,'GetProductsResponse');
      return $responseObject;
  }
  
  /**
   * postProducts
   *
   * Operação utilizada para enviar uma nova carga de produtos (assíncrono)
   *
   * @param array[Product] $products Arquivo em formato &lt;strong&gt;JSON&lt;/strong&gt; cujo conteúdo contêm uma lista de objetos product. (required)
   * @return string
   */
   public function postProducts($products) {
      
      // verify the required parameter 'products' is set
      if ($products === null) {
        throw new \InvalidArgumentException('Missing the required parameter $products when calling postProducts');
      }
      

      // parse inputs
      $resourcePath = "/loads/products";
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
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      
      
      // body params
      $_tempBody = null;
      if (isset($products)) {
        $_tempBody = $products;
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
   * getProduct
   *
   * Operação para consultar um produto enviado
   *
   * @param string $sku_seller_id SKU ID do Lojista. (required)
   * @return GetProductWithErrorsResponse
   */
   public function getProduct($sku_seller_id) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling getProduct');
      }
      

      // parse inputs
      $resourcePath = "/loads/products/{skuSellerId}";
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

      $responseObject = $this->apiClient->deserialize($response,'GetProductWithErrorsResponse');
      return $responseObject;
  }
  
  /**
   * putProduct
   *
   * Operação para alterar um produto enviado na carga
   *
   * @param string $sku_seller_id SKU do produto do lojista que deverá ser alterado. (required)
   * @param Product $body Parâmetros para alterar um produto enviado na carga. (required)
   * @return string
   */
   public function putProduct($sku_seller_id, $body) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling putProduct');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putProduct');
      }
      

      // parse inputs
      $resourcePath = "/loads/products/{skuSellerId}";
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
      if($sku_seller_id !== null) {
        $resourcePath = str_replace("{" . "skuSellerId" . "}",
                                    $this->apiClient->toPathValue($sku_seller_id), $resourcePath);
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
   * deleteProduct
   *
   * Operação utilizada para cancelar uma lista de produtos enviados (SANDBOX)
   *
   * @param string $sku_seller_id SKU do produto do lojista que deverá ser alterado. (required)
   * @return Errors
   */
   public function deleteProduct($sku_seller_id) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling deleteProduct');
      }
      

      // parse inputs
      $resourcePath = "/loads/products/{skuSellerId}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "DELETE";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
      // path params
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

      $responseObject = $this->apiClient->deserialize($response,'Errors');
      return $responseObject;
  }
  
  /**
   * getSellerItemsPricesUpdatingStatus
   *
   * Operação para consulta de atualização massiva de preços
   *
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetSellerItemsPricesUpdatingResponse
   */
   public function getSellerItemsPricesUpdatingStatus($_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getSellerItemsPricesUpdatingStatus');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getSellerItemsPricesUpdatingStatus');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/prices";
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

      $responseObject = $this->apiClient->deserialize($response,'GetSellerItemsPricesUpdatingResponse');
      return $responseObject;
  }
  
  /**
   * putSellerItemsPrices
   *
   * Operação para atualização de preço de produtos em massa
   *
   * @param array[SellerItemPrices] $body Parâmetros para ativação/desativação massiva de produtos (required)
   * @return string
   */
   public function putSellerItemsPrices($body) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemsPrices');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/prices";
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
   * getSellerItemsStatusUpdatingStatus
   *
   * Operação para consulta da atualização massiva de status
   *
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetSellerItemsStatusUpdatingResponse
   */
   public function getSellerItemsStatusUpdatingStatus($_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getSellerItemsStatusUpdatingStatus');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getSellerItemsStatusUpdatingStatus');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/status";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charfset=utf-8'));
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

      $responseObject = $this->apiClient->deserialize($response,'GetSellerItemsStatusUpdatingResponse');
      return $responseObject;
  }
  
  /**
   * putSellerItemsStatus
   *
   * Operação para ativação/desativação massiva de produtos
   *
   * @param array[SellerItemStatusUpdate] $body Parâmetros para ativação/desativação massiva de produtos (required)
   * @return string
   */
   public function putSellerItemsStatus($body) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemsStatus');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/status";
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
   * getSellerItemsStocksUpdatingStatus
   *
   * Operação para consulta do status da atualização massiva de estoque
   *
   * @param int $_offset Parâmetro utilizado para indicar a posição do registro inicial que será trazido. A primeira posição é sempre zero (0). (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetSellerItemsStocksUpdatingResponse
   */
   public function getSellerItemsStocksUpdatingStatus($_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getSellerItemsStocksUpdatingStatus');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getSellerItemsStocksUpdatingStatus');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/stocks";
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

      $responseObject = $this->apiClient->deserialize($response,'GetSellerItemsStocksUpdatingResponse');
      return $responseObject;
  }
  
  /**
   * putSellerItemsStocks
   *
   * Operação para atualização de estoque de produtos em massa
   *
   * @param array[SellerItemStocks] $body Parâmetros para atualização massiva de estoque de produtos. (required)
   * @return string
   */
   public function putSellerItemsStocks($body) {
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemsStocks');
      }
      

      // parse inputs
      $resourcePath = "/loads/sellerItems/stocks";
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
