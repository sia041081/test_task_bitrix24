<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>

<?
if (!empty($_POST['email']) and !empty($_POST['line'])) {

    CModule::IncludeModule('iblock');

//    echo 'Вот такие данные мы передали';
//    echo '<pre>';
//    print_r($_POST);
//    echo '<pre>';



    $el = new CIBlockElement;
    $iblock_id = 2;
    $section_id = false;
    $section_id[$i] = $_POST['section_id']; //Разделы для добавления

    if (!empty($_POST['name'])) {
        $PROP = array();

        $PROP['NAME'] = $_POST['name'];
        $PROP['EMAIL'] = $_POST['email'];
        $PROP['REVIEW'] = $_POST['line'];
        $PROP['PRODUCT'] = $_POST['product_id'];
        if (!empty($_POST['star5'])) {
            $PROP['RATING'] = $_POST['star5'];
        }
        if (!empty($_POST['star4'])){
            $PROP['RATING'] = $_POST['star4'];
        }
        if (!empty($_POST['star3'])){
            $PROP['RATING'] = $_POST['star2'];
        }
        if (!empty($_POST['star2'])){
            $PROP['RATING'] = $_POST['star2'];
        }
        if (!empty($_POST['star1'])){
            $PROP['RATING'] = $_POST['star1'];
        }



        $fields = array(
            "DATE_CREATE" => date("d.m.Y H:i:s"),
            "CREATED_BY" => $GLOBALS['USER']->GetID(),
            "IBLOCK_SECTION" => $section_id[$i],
            "IBLOCK_ID" => $iblock_id,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $_POST['name'],
            "ACTIVE" => "N",


        );
    } else {
        $PROP = array();
        $PROP['EMAIL'] = $_POST['email'];
        $PROP['REVIEW'] = $_POST['line'];
        $PROP['PRODUCT'] = $_POST['product_id'];
        if (!empty($_POST['star5'])) {
            $PROP['RATING'] = $_POST['star5'];
        }
        if (!empty($_POST['star4'])){
            $PROP['RATING'] = $_POST['star4'];
        }
        if (!empty($_POST['star3'])){
            $PROP['RATING'] = $_POST['star2'];
        }
        if (!empty($_POST['star2'])){
            $PROP['RATING'] = $_POST['star2'];
        }
        if (!empty($_POST['star1'])){
            $PROP['RATING'] = $_POST['star1'];
        }


        $fields = array(
            "DATE_CREATE" => date("d.m.Y H:i:s"),
            "CREATED_BY" => $GLOBALS['USER']->GetID(),
            "IBLOCK_SECTION" => $section_id[$i],
            "IBLOCK_ID" => $iblock_id,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $_POST['email'],
            "ACTIVE" => "N",


        );
    }



    
    
    //Результат в конце отработки
    if ($ID = $el->Add($fields)) {
        echo "Сохранено";
    } else {
        echo 'Произошел как-то косяк Попробуйте еще разок';
    }
} else {
    echo "Заполните все поля";
}
?>
   
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
