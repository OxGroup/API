<?php
/**
 * Created by OxGroup.
 * User: Aliaxander
 * Date: 25.11.15
 * Time: 14:35
 */
use Ox\Api\OxApi;

$loader = require __DIR__ . '/../vendor/autoload.php';

$api=new OxApi("http://api.justcpa.biz/","root@justcpa.biz","grtg345g5ujh67iu67iu");


echo "<pre>";
//Добавляем заказ:
$params = array("user" => "43",//Только для API административного уровня
    "ip" => "8.8.8.8",
    "name" => "Имя",
    "phone" => "5654445666",
    "address" => "пушкина 23",
    "counts" => "1",
    "country" => "RU",//Страна оффера
    "offer" => 19,//ID оффера
    "subacc" => json_encode(array("sub1"=>"val1","sub2"=>"val2")),
    "proxy" => "no",//Включен ли прокси у клиента
    "orderId" => "345345345",//ID для отследивания
    "hash" => "g566g65g5g",);//Уникальный код клиента
print_r($api->addOrder($params));

echo "<hr>";
$params= array("user" => 0, //Только для API административного уровня
    "flow" => 5,//ID потока
    "offer" => 243//ID оффера
);
print_r($api->getFlow($params));
//Вернет:
//Array([result] => Array([id] => 5 [user] => 0 [name] => Тест 1 [options] => [offer] => 243 [promo] => 15 [metrika] => 0 [googleConversion] => 0 [topMail] => 0 [trafback] => [postbackApprove] => [postbackCancelled] => [postbackNew] => [transit] => 0 [date] => 2015 - 11 - 18 19:29:28 [split] => [on_disable] => [on_disable_url] => [add] => [advnet] => ) )
echo "<hr>";
//Добавляем посетителя. Уникальность определяется исходи их userhash, IP и оффера
$params = array("ip" => "8.8.8.8",
    "userhash" => "g566g65g5g",
    "user" => 0,
    "referer" => "http://google.com",
    "offer" => 243,
    "subaccs" => json_encode(array("sub1" => "val1", "sub2" => "val2"))
);
print_r($api->addTraffic($params));


echo "<hr>";
$params= array("hostName" => "test.slimliquid.ru",//Hostname лендинга в сети
    "userHash" => "g566g65g5g"//Уникальный номер посетителя, для получения информации о нем
);
print_r($api->getLandingConfig($params));


