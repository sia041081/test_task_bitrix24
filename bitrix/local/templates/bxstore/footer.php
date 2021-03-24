<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<!-- end .workarea from header.php --></div>
<!-- end .content from header.php --></div>
<!-- end .site_container from header.php --></div>


<div class="footer">
    <div class="site_container">
        <div class="footer_col_1">
            <h6>Покупателям</h6>
            <? $APPLICATION->IncludeComponent("bitrix:menu", "footer_menu", Array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "",    // Тип меню для остальных уровней
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",    // Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "ROOT_MENU_TYPE" => "bottom1",    // Тип меню для первого уровня
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                "COMPONENT_TEMPLATE" => ".default"
            ),
                false
            ); ?>
        </div>
        <div class="footer_col_2">
            <h6>Обслуживание</h6>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer_menu",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom2",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            ); ?>
        </div>
        <div class="footer_col_3">
            <h6>Компания</h6>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer_menu",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom3",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            ); ?>
        </div>
        <div class="footer_col_4">
            <h6>Контакты</h6>
            <a href="/">Реквизиты компании</a>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/includes/footercontacts.php"
                )
            );?>
            <div class="ya_metrika">
                <!-- Yandex.Metrika informer --> <a
                        href="https://metrika.yandex.ru/stat/?id=46943847&amp;from=informer"
                        target="_blank" rel="nofollow"><img
                            src="https://informer.yandex.ru/informer/46943847/3_0_FFFFFFFF_EFEFEFFF_0_pageviews"
                            style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                            title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                            class="ym-advanced-informer" data-cid="46943847" data-lang="ru"/></a>
                <!-- /Yandex.Metrika informer -->
                <!-- Yandex.Metrika counter -->
                <script type="text/javascript"> (function (d, w, c) {
                        (w[c] = w[c] || []).push(function () {
                            try {
                                w.yaCounter46943847 = new Ya.Metrika({
                                    id: 46943847,
                                    clickmap: true,
                                    trackLinks: true,
                                    accurateTrackBounce: true,
                                    webvisor: true
                                });
                            } catch (e) {
                            }
                        });
                        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"),
                            f = function () {
                                n.parentNode.insertBefore(s, n);
                            };
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = "https://mc.yandex.ru/metrika/watch.js";
                        if (w.opera == "[object Opera]") {
                            d.addEventListener("DOMContentLoaded", f, false);
                        } else {
                            f();
                        }
                    })(document, window, "yandex_metrika_callbacks"); </script>
                <noscript>
                    <div><img src="https://mc.yandex.ru/watch/46943847" style="position:absolute; left:-9999px;"
                              alt=""/></div>
                </noscript> <!-- /Yandex.Metrika counter -->
            </div>
            <span>
                © 2017 BXSTORE | Сайт вымысел.
                Создан в рамках курса: <a href="https://camouf.ru/video/new_store/" title="Создание магазина на Битрикс">Создание магазина на Битрикс</a>
            </span>
        </div>
    </div>
</div>


</body>
</html>