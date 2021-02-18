<?php
require_once 'script.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Тестовое</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h3 align="center">Таблица товаров</h3>
    <br/>
    <form action="">
        <div style="display: flex; align-content: center">
            <div class="row " style="font-size: 14px;">

                <strong>Показать товары, <br> у которых</strong>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <select id="u1_input" class="form-control" style="font-size: 16px">
                        <option value="the_cost_rub">Розничная цена</option>
                        <option value="wholesale_price_rub">Оптовая цена</option>
                    </select>
                </div>
                <strong>от</strong>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <input id="u3_input" class="form-control" type="text" value="1000">
                </div>
                <strong>до</strong>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <input id="u4_input" class="form-control" type="text" value="3000">
                </div>
                <strong>рублей и на складе</strong>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <select id="u7_input" class="form-control" style="font-size: 16px">
                        <option value=">">Более</option>
                        <option value="<">Менее</option>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                    <input id="u5_input" class="form-control" type="text" value="20">
                </div>
                <strong>штук</strong>
                &nbsp;
                <button type="button" id="select_btn" class="btn btn-outline-success">Показать товары</button>
            </div>
        </div>
    </form>
    <br/>
    <div class="table-responsive">
        <span id="message"></span>
        <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <div class="table-container" id="main-table">
                <table class="table table-bordered rows">
                    <thead>

                    <tr>
                        <th scope="col">Id товара</th>
                        <th scope="col">Наименование товара</th>
                        <th scope="col">Стоимость, руб</th>
                        <th scope="col">Стоимость опт, руб</th>
                        <th scope="col">Наличие на складе 1, шт</th>
                        <th scope="col">Наличие на складе 2, шт</th>
                        <th scope="col">Страна производства</th>
                        <th scope="col">Примечание</th>
                    </tr>
                    </thead>
                    <tbody id="product_table">
                    <?php foreach ($products as $product) : ?>
                    <tr>
                        <th scope="row" id="id_product"><?= $product['id'] ?></th>
                        <td id="product_name"><?= $product['product_name'] ?></td>
                        <?php if ($product['the_cost_rub'] == $max_coast[0]) {
                            echo "<td id='the_cost_rub' style='background:red;'>" . $product['the_cost_rub'] . "</td>";
                        } else {
                            echo "<td id= 'the_cost_rub'>" . $product['the_cost_rub'] . "</td>";
                        }
                        ?>
                        <?php if ($product['wholesale_price_rub'] == $min_coast[0]) {
                            echo "<td id='wholesale_price_rub' style='background:green;'>" . $product['the_cost_rub'] . "</td>";
                        } else {
                            echo "<td id='wholesale_price_rub'>" . $product['wholesale_price_rub'] . "</td>";
                        }
                        ?>

                        <td id="stock_availability_1_st"><?= $product['stock_availability_1_st'] ?></td>
                        <td id="stock_availability_2_st"><?= $product['stock_availability_2_st'] ?></td>
                        <td id="producing_country"><?= $product['producing_country'] ?></td>
                        <td id="Note"><?php if ($product['stock_availability_1_st'] < 20 or $product['stock_availability_2_st'] < 20) {
                                echo "Осталось мало!! Срочно докупите!!!";
                            } ?></td>

                    </tr>

                    </tbody>
                    <?php endforeach; ?>
                    <tr>
                        <td>Сумма</td>
                        <td></td>
                        <td><?= round($summ_roz[0], $precision = 2) ?> руб.</td>
                        <td><?= round($summ_opt[0], $precision = 2) ?> руб.</td>
                        <td><?= $summ_skl_1[0] ?> шт.</td>
                        <td><?= $summ_skl_2[0] ?> шт.</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Всего товара: <?= $kol_tow ?> шт.</td>

                    </tr>
                </table>
                <br/>

            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                    crossorigin="anonymous"></script>
            <script src="sript.js"></script>
</body>
</html>
