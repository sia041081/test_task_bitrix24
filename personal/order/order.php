<?php
use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;

global $USER;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

// Допустим некоторые поля приходит в запросе
$request = Context::getCurrent()->getRequest();
$productId = $request["PRODUCT_ID"];
$phone = $request["PHONE"];
$name = $request["NAME"];
$comment = $request["COMMENT"];

$siteId = Context::getCurrent()->getSite();
$currencyCode = CurrencyManager::getBaseCurrency();

// Создаёт новый заказ
$order = Order::create($siteId, $USER->isAuthorized() ? $USER->GetID() : 539);
$order->setPersonTypeId(1);
$order->setField('CURRENCY', $currencyCode);
if ($comment) {
    $order->setField('USER_DESCRIPTION', $comment); // Устанавливаем поля комментария покупателя
}

// Создаём корзину с одним товаром
$basket = Basket::create($siteId);
$item = $basket->createItem('catalog', $productId);
$item->setFields(array(
    'QUANTITY' => 1,
    'CURRENCY' => $currencyCode,
    'LID' => $siteId,
    'PRODUCT_PROVIDER_CLASS' => '\CCatalogProductProvider',
));
$order->setBasket($basket);

// Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem();
$service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
$shipment->setFields(array(
    'DELIVERY_ID' => $service['ID'],
    'DELIVERY_NAME' => $service['NAME'],
));
$shipmentItemCollection = $shipment->getShipmentItemCollection();
$shipmentItem = $shipmentItemCollection->createItem($item);
$shipmentItem->setQuantity($item->getQuantity());

// Создаём оплату со способом #1
$paymentCollection = $order->getPaymentCollection();
$payment = $paymentCollection->createItem();
$paySystemService = PaySystem\Manager::getObjectById(1);
$payment->setFields(array(
    'PAY_SYSTEM_ID' => $paySystemService->getField("PAY_SYSTEM_ID"),
    'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
));

// Устанавливаем свойства
$propertyCollection = $order->getPropertyCollection();
$phoneProp = $propertyCollection->getPhone();
$phoneProp->setValue($phone);
$nameProp = $propertyCollection->getPayerName();
$nameProp->setValue($name);

// Сохраняем
$order->doFinalAction(true);
$result = $order->save();
$orderId = $order->getId();?>