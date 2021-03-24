<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams, $arResult
 * @var CBitrixComponentTemplate $this
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
$tabIndex = 1;
?><? if ($arParams['SHOW_MINIMIZED'] == "Y")
{
	?>
	<div class="reviews-collapse reviews-minimized" style='position:relative; float:none;'>
		<a class="reviews-collapse-link" id="sw<?=$arParams["FORM_ID"]?>" onclick="BX.onCustomEvent(BX('<?=$arParams["FORM_ID"]?>'), 'onTransverse')" href="javascript:void(0);"><?=$arParams['MINIMIZED_EXPAND_TEXT']?></a>
	</div>
	<?
}
?>

<a name="review_anchor"></a>
<?
if (!empty($arResult["ERROR_MESSAGE"])):
	$arResult["ERROR_MESSAGE"] = preg_replace(array("/<br(.*?)><br(.*?)>/is", "/<br(.*?)>$/is"), array("<br />", ""), $arResult["ERROR_MESSAGE"]);
	?>
	<div class="reviews-note-box reviews-note-error">
		<div class="reviews-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"], "reviews-note-error");?></div>
	</div>
<?
endif;
?>

<div class="reviews-reply-form" <?=(($arParams['SHOW_MINIMIZED'] == "Y") ? 'style="display:none;"' : '' )?> style="border: none">
<form class="review-form" name="<?=$arParams["FORM_ID"] ?>" id="<?=$arParams["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>#postform"<?
?> method="POST" enctype="multipart/form-data" class="reviews-form" >
<script type="text/javascript">
	BX.ready(function(){
		BX.Forum.Init({
			id : <?=CUtil::PhpToJSObject(array_keys($arResult["MESSAGES"]))?>,
			form : BX('<?=$arParams["FORM_ID"]?>'),
			preorder : '<?=$arParams["PREORDER"]?>',
			pageNumber : <?=intval($arResult['PAGE_NUMBER']);?>,
			pageCount : <?=intval($arResult['PAGE_COUNT']);?>,
			bVarsFromForm : '<?=$arParams["bVarsFromForm"]?>',
			ajaxPost : '<?=$arParams["AJAX_POST"]?>',
			lheId : 'REVIEW_TEXT'
		});
		<? if ($arParams['SHOW_MINIMIZED'] == "Y")
		{
		?>
		BX.addCustomEvent(BX('<?=$arParams["FORM_ID"]?>'), 'onBeforeHide', function() {
			var link = BX('sw<?=$arParams["FORM_ID"]?>');
			if (link) {
				link.innerHTML = BX.message('MINIMIZED_EXPAND_TEXT');
				BX.removeClass(BX.addClass(link.parentNode, "reviews-expanded"), "reviews-minimized");
			}
		});
		BX.addCustomEvent(BX('<?=$arParams["FORM_ID"]?>'), 'onBeforeShow', function() {
			var link = BX('sw<?=$arParams["FORM_ID"]?>');
			if (link) {
				link.innerHTML = BX.message('MINIMIZED_MINIMIZE_TEXT');
				BX.removeClass(BX.addClass(link.parentNode, "reviews-minimized"), "reviews-expanded");
			}
		});
		<?
		}
		?>
	});
</script>
	<input type="hidden" name="index" value="<?=htmlspecialcharsbx($arParams["form_index"])?>" />
	<input type="hidden" name="back_page" value="<?=$arResult["CURRENT_PAGE"]?>" />
	<input type="hidden" name="ELEMENT_ID" value="<?=$arParams["ELEMENT_ID"]?>" />
	<input type="hidden" name="SECTION_ID" value="<?=$arResult["ELEMENT_REAL"]["IBLOCK_SECTION_ID"]?>" />
	<input type="hidden" name="save_product_review" value="Y" />
	<input type="hidden" name="preview_comment" value="N" />
	<input type="hidden" name="AJAX_POST" value="<?=$arParams["AJAX_POST"]?>" />
	<?=bitrix_sessid_post()?>
	<?
	if ($arParams['AUTOSAVE'])
		$arParams['AUTOSAVE']->Init();
	?>

		<?
		/* GUEST PANEL */
		if (!$arResult["IS_AUTHORIZED"]):
			?>

                    <input class="input" name="REVIEW_AUTHOR" id="REVIEW_AUTHOR<?=$arParams["form_index"]?>"  type="text"  placeholder="Your Name" tabindex="<?=$tabIndex++;?>" />
					<?
					if ($arResult["FORUM"]["ASK_GUEST_EMAIL"]=="Y"):
						?>

                            <input class="input" type="email" name="REVIEW_EMAIL" id="REVIEW_EMAIL<?=$arParams["form_index"]?>"  value="<?=$arResult["REVIEW_EMAIL"]?>" placeholder="Your Email" tabindex="<?=$tabIndex++;?>" />
					<?
					endif;
					?>
                    <div class="input-rating">
                        <span>Your Rating: </span>
                        <div class="stars">
                            <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                            <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                            <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                            <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                            <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                        </div>
                    </div>
                    <br>


		<?
		endif;
		?>


			<?
			$APPLICATION->IncludeComponent(
				"bitrix:main.post.form",
				"",
				Array(
					"FORM_ID" => $arParams["FORM_ID"],
					"SHOW_MORE" => "Y",
					"PARSER" => forumTextParser::GetEditorToolbar(array("forum" => $arResult["FORUM"])),

					"LHE" => array(
						'id' => 'REVIEW_TEXT',
						'bSetDefaultCodeView' => ($arParams['EDITOR_CODE_DEFAULT'] === "Y"),
						'bResizable' => true,
						'bAutoResize' => true,
						"documentCSS" => "body {color:#434343; font-size: 14px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 20px;}",
						'setFocusAfterShow' => false
					),

					"ADDITIONAL" => array(),

					"TEXT" => Array(
						"ID" => "REVIEW_TEXT",
						"NAME" => "REVIEW_TEXT",
						"VALUE" => isset($arResult["REVIEW_TEXT"]) ? $arResult["REVIEW_TEXT"] : "",
						"SHOW" => "Y",
						"HEIGHT" => "200px"),

					"SMILES" => COption::GetOptionInt("forum", "smile_gallery_id", 0),
					"NAME_TEMPLATE" => $arParams["NAME_TEMPLATE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>



</div>
			<input class="primary-btn" name="send_button" type="submit" value="<?=GetMessage("OPINIONS_SEND")?>" tabindex="<?=$tabIndex++;?>" <?
			?>onclick="this.form.preview_comment.value = 'N';" />
<!--			<input name="view_button" type="submit" value="--><?//=GetMessage("OPINIONS_PREVIEW")?><!--" tabindex="--><?//=$tabIndex++;?><!--" --><?//
//			?><!--onclick="this.form.preview_comment.value = 'VIEW';" />-->



</form>

<?
if ($arParams['AUTOSAVE'])
	$arParams['AUTOSAVE']->LoadScript(array(
		"formID" => CUtil::JSEscape($arParams["FORM_ID"]),
		"controlID" => "REVIEW_TEXT"
	));
?>