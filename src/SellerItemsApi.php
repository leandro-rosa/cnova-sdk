<?php

namespace CNovaApiLojistaV2;

class SellerItemsApi {

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
   * getSellerItems
   *
   * Recupera todos os produtos que estão associados ao Lojista
   *
   * @param string $site Site do qual deseja consultar o produto. Se o parâmetro não for informado, serão trazidos apenas produtos do Extra. Consulte a lista completa de sites disponíveis no serviço &lt;a href=&#39;#!/sites&#39; target=&#39;_blank&#39;&gt;&lt;strong&gt;GET /sites&lt;/strong&gt;&lt;/a&gt; (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @return GetSellerItemsResponse
   */
   public function getSellerItems($site, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getSellerItems');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getSellerItems');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems";
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
      if($site !== null) {
        $queryParams['site'] = $this->apiClient->toQueryValue($site);
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

      $responseObject = $this->apiClient->deserialize($response,'GetSellerItemsResponse');
      return $responseObject;
  }
  
  /**
   * getSellerItemsByStatusActive
   *
   * Recupera produtos do Lojista que estão disponíveis para venda
   *
   * @param string $site Site do qual deseja consultar os produtos. Se o parâmetro não for informado, serão trazidos apenas produtos do Extra. Os possíveis sites são: &#39;EX&#39;, &#39;PF&#39;, &#39;CB&#39;, &#39;EH&#39;, &#39;BT&#39;, &#39;CD&#39;. Consulte a lista completa de sites disponíveis no serviço &lt;a href=&#39;#!/sites&#39; target=&#39;_blank&#39;&gt;&lt;strong&gt;GET /sites&lt;/strong&gt;&lt;/a&gt; (required)
   * @param int $_offset Parâmetro utilizado para indicar a posição inicial da consulta. O registro inicial tem índice zero (0), ou seja, para trazer os 10 primeiros registros, informa 0 para _offset e 10 para _limit. (required)
   * @param int $_limit Parâmetro utilizado para indicar a quantidade de registros que deve ser trazido na consulta (required)
   * @return GetSellerItemsResponse
   */
   public function getSellerItemsByStatusActive($site, $_offset, $_limit) {
      
      // verify the required parameter '_offset' is set
      if ($_offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_offset when calling getSellerItemsByStatusActive');
      }
      
      // verify the required parameter '_limit' is set
      if ($_limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $_limit when calling getSellerItemsByStatusActive');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems/status/selling";
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
      if($site !== null) {
        $queryParams['site'] = $this->apiClient->toQueryValue($site);
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

      $responseObject = $this->apiClient->deserialize($response,'GetSellerItemsResponse');
      return $responseObject;
  }
  
  /**
   * getSellerItemBySkuSellerId
   *
   * Recupera detalhes do item do Lojista através do skuSellerId (sku do produto do Lojista) informado
   *
   * @param string $sku_seller_id SKU ID do Lojista. (required)
   * @param string $site Site do qual deseja consultar o produto. Se o parâmetro não for informado, serão trazidos apenas produtos do Extra. Consulte a lista completa de sites disponíveis no serviço &lt;a href=&#39;#!/sites&#39; target=&#39;_blank&#39;&gt;&lt;strong&gt;GET /sites&lt;/strong&gt;&lt;/a&gt; (required)
   * @return SellerItem
   */
   public function getSellerItemBySkuSellerId($sku_seller_id, $site) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling getSellerItemBySkuSellerId');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems/{skuSellerId}";
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
      if($site !== null) {
        $queryParams['site'] = $this->apiClient->toQueryValue($site);
      }
      
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

      $responseObject = $this->apiClient->deserialize($response,'SellerItem');
      return $responseObject;
  }
  
  /**
   * putSellerItemPrices
   *
   * Atualização de preço do item do Lojista
   *
   * @param string $sku_seller_id SKU ID do Lojista. (required)
   * @param Prices $body Parâmetros para atualização de preço do SKU (required)
   * @return string
   */
   public function putSellerItemPrices($sku_seller_id, $body) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling putSellerItemPrices');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemPrices');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems/{skuSellerId}/prices";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
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
   * putSellerItemStatus
   *
   * Ativação/Desativação de produto no Marketplace
   *
   * @param string $sku_seller_id SKU ID do Lojista. (required)
   * @param SellerItemStatus $body Parâmetros para ativação/desativação do SKU. (required)
   * @return string
   */
   public function putSellerItemStatus($sku_seller_id, $body) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling putSellerItemStatus');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemStatus');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems/{skuSellerId}/status";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json; charset=utf-8'));
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array('application/json'));

      
      
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
   * putSellerItemStock
   *
   * Atualização de estoque do item do Lojista
   *
   * @param string $sku_seller_id SKU ID do Lojista. (required)
   * @param Stock $body Parâmetros para atualização de estoque do SKU (required)
   * @return string
   */
   public function putSellerItemStock($sku_seller_id, $body) {
      
      // verify the required parameter 'sku_seller_id' is set
      if ($sku_seller_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $sku_seller_id when calling putSellerItemStock');
      }
      
      // verify the required parameter 'body' is set
      if ($body === null) {
        throw new \InvalidArgumentException('Missing the required parameter $body when calling putSellerItemStock');
      }
      

      // parse inputs
      $resourcePath = "/sellerItems/{skuSellerId}/stock";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "PUT";
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
  

}
