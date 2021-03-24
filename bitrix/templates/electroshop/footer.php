<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/jquery.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/slick.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/nouislider.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/jquery.zoom.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/main.js"></script>
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "standard.php",
		"PATH" => "include/about_us.php",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
); ?>
                        <ul class="footer-links">
                            <li><a href="#"><? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "standard.php",
                                            "PATH" => "include/include_area_adress.php"
                                        )
                                    ); ?></a></li>
                            <li><a href="#"><? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "standard.php",
                                            "PATH" => "include/include_area_tel.php"
                                        )
                                    ); ?></a></li>
                            <li><a href="#"><? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "standard.php",
                                            "PATH" => "include/include_area_mail.php"
                                        )
                                    ); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "template_2",
                                Array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "left",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(""),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "bottom",
                                    "USE_EXT" => "N"
                                )
                            );?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "template1",
                                array(
                                    "COMPONENT_TEMPLATE" => "template1",
                                    "ROOT_MENU_TYPE" => "right",
                                    "MENU_CACHE_TYPE" => "Y",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MAX_LEVEL" => "1",
                                    "CHILD_MENU_TYPE" => "right",
                                    "USE_EXT" => "N",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N"
                                ),
                                false
                            ); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "template1",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "top",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "left",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "template1",
                                    "MENU_THEME" => "site"
                                ),
                                false
                            ); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->
</footer>
<!-- /FOOTER -->


</body>
</html>
