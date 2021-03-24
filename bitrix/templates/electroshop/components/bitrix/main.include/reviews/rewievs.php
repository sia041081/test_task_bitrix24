<?
if($_POST["OK"]){
    if(CModule::IncludeModule("iblock")){
        if($_POST["NAME"]!="" && $_POST["EMAIL"]!="" && $_POST["REVIEWS"]!="" && $_POST["PHONE"]!=""){
            echo "Спасибо, Ваше сообщение отправлено! В ближайшее время его проверят";
            $el = new CIBlockElement;
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                "IBLOCK_ID"      => 17, // id инфоблока, который вы создали
                "NAME"           => $_POST["NAME"], // имя пользователя будет именем элемента
                "ACTIVE"         => "N",            // убираем активность
                "PREVIEW_TEXT"   => $_POST["REVIEWS"], // отзыв клиента
                "DETAIL_TEXT"    => "E-Mail: " . $_POST["EMAIL"] . "\nТелефон: " . $_POST["PHONE"], // контактные данные клиента
                "PREVIEW_PICTURE" => CFile::MakeFileArray($fileID)
            );
            if($PRODUCT_ID = $el->Add($arLoadProductArray))
                echo "";
            else
                echo "";
        }else{
            echo "Заполнены не все поля";
        }
    }
}
?>