<?php
/**
 * 示例接口名称：pdd.promotion.limited.discount.list.get
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddPromotionLimitedDiscountListGetRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddPromotionLimitedDiscountListGetRequest();

$request->setActivityTypes(array(1));
$request->setGoodsIdList(array(1));
$request->setJustCount(true);
$request->setOrder(1);
$request->setPageNo(1);
$request->setPageSize(1);
$request->setStatusList(array(1));
try{
	$response = $client->syncInvoke($request);
} catch(Com\Pdd\Pop\Sdk\PopHttpException $e){
	echo $e->getMessage();
	exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
	echo "异常返回";
}
echo json_encode($content,JSON_UNESCAPED_UNICODE);