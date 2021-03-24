<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult['ERROR'])) {
    echo $arResult['ERROR'];
    return false;
}

//$GLOBALS['APPLICATION']->SetTitle('Highloadblock List');

?>

<div class="reports-result-list-wrap">
    <div class="report-table-wrap">

            <!-- data -->
            <? foreach ($arResult['rows'] as $row): ?>

                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <?= $row['UF_IMG'] ?>
                        </div>
                        <div class="shop-body">
                            <h3><?= $row['UF_NAME'] ?></h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <? endforeach; ?>



        <form id="hlblock-table-form" action="" method="get">
            <input type="hidden" name="BLOCK_ID" value="<?= htmlspecialcharsbx($arParams['BLOCK_ID']) ?>">
            <input type="hidden" name="sort_id" value="">
            <input type="hidden" name="sort_type" value="">
        </form>

        <script type="text/javascript">
            BX.ready(function () {
                var rows = BX.findChildren(BX('report-result-table'), {tag: 'th'}, true);
                for (i in rows) {
                    var ds = rows[i].getAttribute('defaultSort');
                    if (ds == '') {
                        BX.addClass(rows[i], 'report-column-disabled-sort')
                        continue;
                    }

                    BX.bind(rows[i], 'click', function () {
                        var colId = this.getAttribute('colId');
                        var sortType = '';

                        var isCurrent = BX.hasClass(this, 'reports-selected-column');

                        if (isCurrent) {
                            var currentSortType = BX.hasClass(this, 'reports-head-cell-top') ? 'ASC' : 'DESC';
                            sortType = currentSortType == 'ASC' ? 'DESC' : 'ASC';
                        } else {
                            sortType = this.getAttribute('defaultSort');
                        }

                        var idInp = BX.findChild(BX('hlblock-table-form'), {attr: {name: 'sort_id'}});
                        var typeInp = BX.findChild(BX('hlblock-table-form'), {attr: {name: 'sort_type'}});

                        idInp.value = colId;
                        typeInp.value = sortType;

                        BX.submit(BX('hlblock-table-form'));
                    });
                }
            });
        </script>

    </div>
