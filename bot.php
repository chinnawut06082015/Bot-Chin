<?php
 http_response_code(200);


use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use \LINE\LINEBot\Constant\HTTPHeader;

//LINESDKの読み込み
require_once(__DIR__."/vendor/autoload.php");

//LINEから送られてきたらtrueになる
if(isset($_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE])){

//LINEBOTにPOSTで送られてきた生データの取得
  $inputData = file_get_contents("php://input");

//LINEBOTSDKの設定
 
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3ac88d67a3c8f207a35717e4537f6f58']);

  $signature = $_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE]; 
  $Events = $Bot->parseEventRequest($InputData, $Signature);

//大量にメッセージが送られると複数分のデータが同時に送られてくるため、foreachをしている。
　　foreach($Events as $event){
    $SendMessage = new MultiMessageBuilder();
    $TextMessageBuilder = new TextMessageBuilder("よろぽん！");
    $SendMessage->add($TextMessageBuilder);
    $Bot->replyMessage($event->getReplyToken(), $SendMessage);
  }

?>