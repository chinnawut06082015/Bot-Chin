<?php
require "vendor/autoload.php";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3ac88d67a3c8f207a35717e4537f6f58']);

$response = $bot->replyText('<reply token>', 'hello!');

?>