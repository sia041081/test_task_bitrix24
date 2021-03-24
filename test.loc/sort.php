<?php
$connect = mysqli_connect("localhost", "root", "", "base");


$cost_form = $_POST['u1_input'];
$val_min = trim((float)$_POST['u3_input']);
$val_max = trim((float)$_POST['u4_input']);
$sign = $_POST['u7_input'];
$val_sklad = trim((int)$_POST['u5_input']);
if ($sign = $_POST['u7_input'] == '<') {
    $query = ("SELECT * FROM pricelist WHERE ($cost_form BETWEEN $val_min AND $val_max)  
                                        AND (stock_availability_1_st < $val_sklad and stock_availability_2_st < $val_sklad)");
} else {
    $query = ("SELECT * FROM pricelist WHERE ($cost_form BETWEEN $val_min AND $val_max) 
                                        AND (stock_availability_1_st > $val_sklad and stock_availability_2_st > $val_sklad)");

}
if(!$query) {
    echo "Не товара";
    die;
}

$result = mysqli_query($connect, $query);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);


echo json_encode($result, JSON_UNESCAPED_UNICODE);



