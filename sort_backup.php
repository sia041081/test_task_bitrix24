<?php
$connect = new PDO("mysql:host=localhost;dbname=base;charset=utf8", "homestead", "secret");

$products = $connect->query("SELECT * FROM pricelist;");

$summ_roz = $connect->query("SELECT AVG(the_cost_rub) FROM pricelist;");
$summ_roz = $summ_roz->fetch();

$summ_opt = $connect->query("SELECT AVG(wholesale_price_rub) FROM pricelist;");
$summ_opt = $summ_opt->fetch();

$summ_skl_1 = $connect->query("SELECT SUM(stock_availability_1_st) FROM pricelist;");
$summ_skl_1 = $summ_skl_1->fetch();

$summ_skl_2 = $connect->query("SELECT SUM(stock_availability_2_st) FROM pricelist;");
$summ_skl_2 = $summ_skl_2->fetch();

$kol_tow = $summ_skl_2[0] + $summ_skl_1[0];

$max_query = $connect->query("SELECT MAX(the_cost_rub) FROM pricelist;");
$max_coast = $max_query->fetch();

$min_query = $connect->query("SELECT MIN(wholesale_price_rub) FROM pricelist WHERE wholesale_price_rub > 0;");
$min_coast = $min_query->fetch();
//var_dump($_POST['cost']);


$cost_form = $_POST['cost'];
$val_min = (float)$_POST['val_min'];
$val_max = (float)$_POST['val_max'];
$sign = $_POST['sign'];
$val_sklad =(int)$_POST['val_sklad'];

$query = $connect->query("SELECT * FROM pricelist WHERE ($cost_form BETWEEN $val_min AND $val_max) AND (stock_availability_1_st $sign $val_sklad OR stock_availability_2_st $sign $val_sklad)");

$selected = $query->fetch();
var_dump($selected);

