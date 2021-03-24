<?
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("OnAfterArticleAdd", "OnAfterIBlockElementAddHandlerLast"));
class OnAfterArticleAdd {
    function OnAfterIBlockElementAddHandlerLast(&$arFields) {
        if ($arFields["IBLOCK_ID"] == 2) {

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            $message = 'Текст отзыва: '.$arFields['PREVIEW_TEXT'];
            mail('sia-05@mail.ru', 'Добавлен отзыв на сайт', $message, $headers);
        }
    }
}

AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'IBFeedForm');


function IBFeedForm(&$arFields)
{

    $SITE_ID = 's1';
    $IBLOCK_ID = 2;
    $EVEN_TYPE = 'NEW_ELEMET_ADDED';

    if ($arFields['IBLOCK_ID'] == $IBLOCK_ID) {


        $arFeedForm = array(


            "ADD_NAME" => $arFields['NAME'],
            "ADD_ANOUNCE" => $arFields['PREVIEW_TEXT'],
            "ADD_DETAIL" => $arFields['DETAIL_TEXT'],


            "ADD_SOURCE" => $arFields['PROPERTY_VALUES']['143'],
            "ADD_LINK" => $arFields['PROPERTY_VALUES']['153'],
            "ADD_AUTOR" => $arFields['PROPERTY_VALUES']['154'],
        );


        CEvent::Send($EVEN_TYPE, $SITE_ID, $arFeedForm );
    }
}

AddEventHandler("sale", "OnSaleComponentOrderOneStepComplete", Array("mail_new", "OnOrderAdd_mail"));

class mail_new
{

    function OnOrderAdd_mail($ID, $val)
    {

        // Получаем имя и мэйл пользователя
        $rsUser = CUser::GetList(($by = "ID"), ($order = "asc"), array("ID" => $val["USER_ID"]), array("NAME", "LAST_NAME", "EMAIL"));
        $arUser = $rsUser->GetNext();
        //$arUser_name = $arUser["LAST_NAME"]." ".$arUser["NAME"];
        $arUser_mail = $arUser["EMAIL"];

        // Получаем Содержимое заказа
        $dbBasketItems = CSaleBasket::GetList(
            array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
            array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "DELAY" => "N",
                "CAN_BUY" => "Y",
                "ORDER_ID" => $ID
            ),
            false,
            false,
            array()
        );

        $zak = "Корзина заказа:<br /><table border='1'>";
        $zak = $zak."<tr><td align='center'>Товар</td><td align='center'>Цена</td><td align='center'>Кол-во</td><td align='center'>Сумма</td></tr>";

        while ($arItem = $dbBasketItems->Fetch())
        {
            $st = (int)$arItem["QUANTITY"]*$arItem["PRICE"];
            $kol_vo = (int)$arItem["QUANTITY"];
            $zak = $zak."<tr><td align='left'>"."<a href='".$arItem["DETAIL_PAGE_URL"]."'>".$arItem["NAME"]."</a></td><td align='left'>".$arItem["PRICE"]."</td><td align='left'>".$kol_vo."</td><td align='left'>".$st."</td></tr>";
        }
        $zak = $zak."</table>";







        CModule::IncludeModule("sale");
        $db_props = CSaleOrderPropsValue::GetList(array("ORDER_ID" => desc), array("ORDER_ID" => $ID));

        while ($arProps = $db_props->Fetch())
        {
            if($arProps["ORDER_PROPS_ID"]==25):
                $arVal = CSaleOrderPropsVariant::GetByValue(25, $arProps["VALUE"]);
                $arProps["VALUE"] = $arVal["NAME"];
            endif;
            $savoi.=$arProps["NAME"].":".$arProps["VALUE"]."<br />";
            if(($arProps["ORDER_PROPS_ID"]==5)||($arProps["ORDER_PROPS_ID"]==6)):
                $arUser_name = $arProps["VALUE"];
            endif;


        }

        $arOrder = CSaleOrder::GetByID($ID);
        if($arOrder["PAY_SYSTEM_ID"])
        {
            if ($arPaySys = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"], $arOrder["PERSON_TYPE_ID"]))
            {
                $savoi.="Способ оплаты: ".$arPaySys["PSA_NAME"]."<br />";
            }
        }





        $arEventFields = array(
            "ORDER_ID"         => $ID,
            "SOSTAV"              => $zak,
            "ORDER_USER"    => $arUser_name,
            "EMAIL"                 => $arUser_mail,
            "BCC"                     => $arUser_mail,
            "PRICE"                  => (int)$val["PRICE"]." руб",
            "PRICESS"                  => $savoi
        );

        CEvent::SendImmediate("SALEINFOADMIN", s1, $arEventFields, "N", 25);
    }
}