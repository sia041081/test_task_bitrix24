
; /* Start:"a:4:{s:4:"full";s:110:"/bitrix/templates/electroshop/components/bitrix/sale.basket.basket.line/template1/script.min.js?16153026853876";s:6:"source";s:91:"/bitrix/templates/electroshop/components/bitrix/sale.basket.basket.line/template1/script.js";s:3:"min";s:95:"/bitrix/templates/electroshop/components/bitrix/sale.basket.basket.line/template1/script.min.js";s:3:"map";s:95:"/bitrix/templates/electroshop/components/bitrix/sale.basket.basket.line/template1/script.map.js";}"*/
"use strict";function BitrixSmallCart(){}BitrixSmallCart.prototype={activate:function(){this.cartElement=BX(this.cartId);this.fixedPosition=this.arParams.POSITION_FIXED=="Y";if(this.fixedPosition){this.cartClosed=true;this.maxHeight=false;this.itemRemoved=false;this.verticalPosition=this.arParams.POSITION_VERTICAL;this.horizontalPosition=this.arParams.POSITION_HORIZONTAL;this.topPanelElement=BX("bx-panel");this.fixAfterRender();this.fixAfterRenderClosure=this.closure("fixAfterRender");var t=this.closure("fixCart");this.fixCartClosure=t;if(this.topPanelElement&&this.verticalPosition=="top")BX.addCustomEvent(window,"onTopPanelCollapse",t);var e=null;BX.bind(window,"resize",function(){clearTimeout(e);e=setTimeout(t,200)})}this.setCartBodyClosure=this.closure("setCartBody");BX.addCustomEvent(window,"OnBasketChange",this.closure("refreshCart",{}))},fixAfterRender:function(){this.statusElement=BX(this.cartId+"status");if(this.statusElement){if(this.cartClosed)this.statusElement.innerHTML=this.openMessage;else this.statusElement.innerHTML=this.closeMessage}this.productsElement=BX(this.cartId+"products");this.fixCart()},closure:function(t,e){var i=this;return e?function(){i[t](e)}:function(e){i[t](e)}},toggleOpenCloseCart:function(){if(this.cartClosed){BX.removeClass(this.cartElement,"bx-closed");BX.addClass(this.cartElement,"bx-opener");this.statusElement.innerHTML=this.closeMessage;this.cartClosed=false;this.fixCart()}else{BX.addClass(this.cartElement,"bx-closed");BX.removeClass(this.cartElement,"bx-opener");BX.removeClass(this.cartElement,"bx-max-height");this.statusElement.innerHTML=this.openMessage;this.cartClosed=true;var t=this.cartElement.querySelector("[data-role='basket-item-list']");if(t)t.style.top="auto"}setTimeout(this.fixCartClosure,100)},setVerticalCenter:function(t){var e=t/2-this.cartElement.offsetHeight/2;if(e<5)e=5;this.cartElement.style.top=e+"px"},fixCart:function(){if(this.horizontalPosition=="hcenter"){var t="innerWidth"in window?window.innerWidth:document.documentElement.offsetWidth;var e=t/2-this.cartElement.offsetWidth/2;if(e<5)e=5;this.cartElement.style.left=e+"px"}var i="innerHeight"in window?window.innerHeight:document.documentElement.offsetHeight;switch(this.verticalPosition){case"top":if(this.topPanelElement)this.cartElement.style.top=this.topPanelElement.offsetHeight+5+"px";break;case"vcenter":this.setVerticalCenter(i);break}if(this.productsElement){var s=this.cartElement.querySelector("[data-role='basket-item-list']");if(this.cartClosed){if(this.maxHeight){BX.removeClass(this.cartElement,"bx-max-height");if(s)s.style.top="auto";this.maxHeight=false}}else{if(this.maxHeight){if(this.productsElement.scrollHeight==this.productsElement.clientHeight){BX.removeClass(this.cartElement,"bx-max-height");if(s)s.style.top="auto";this.maxHeight=false}}else{if(this.verticalPosition=="top"||this.verticalPosition=="vcenter"){if(this.cartElement.offsetTop+this.cartElement.offsetHeight>=i){BX.addClass(this.cartElement,"bx-max-height");if(s)s.style.top=82+"px";this.maxHeight=true}}else{if(this.cartElement.offsetHeight>=i){BX.addClass(this.cartElement,"bx-max-height");if(s)s.style.top=82+"px";this.maxHeight=true}}}}if(this.verticalPosition=="vcenter")this.setVerticalCenter(i)}},refreshCart:function(t){if(this.itemRemoved){this.itemRemoved=false;return}t.sessid=BX.bitrix_sessid();t.siteId=this.siteId;t.templateName=this.templateName;t.arParams=this.arParams;BX.ajax({url:this.ajaxPath,method:"POST",dataType:"html",data:t,onsuccess:this.setCartBodyClosure})},setCartBody:function(t){if(this.cartElement)this.cartElement.innerHTML=t.replace(/#CURRENT_URL#/g,this.currentUrl);if(this.fixedPosition)setTimeout(this.fixAfterRenderClosure,100)},removeItemFromCart:function(t){this.refreshCart({sbblRemoveItemFromCart:t});this.itemRemoved=true;BX.onCustomEvent("OnBasketChange")}};
/* End */
;
; /* Start:"a:4:{s:4:"full";s:97:"/bitrix/templates/electroshop/components/bitrix/menu/menu_header_electro/script.js?16148745995632";s:6:"source";s:82:"/bitrix/templates/electroshop/components/bitrix/menu/menu_header_electro/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
(function(window) {

	if (!window.BX || BX.CatalogMenu)
		return;

	BX.CatalogMenu = {
		items : {},
		idCnt : 1,
		currentItem : null,
		overItem : null,
		outItem : null,
		timeoutOver : null,
		timeoutOut : null,

		getItem : function(item)
		{
			if (!BX.type.isDomNode(item))
				return null;

			var id = !item.id || !BX.type.isNotEmptyString(item.id) ? (item.id = "menu-item-" + this.idCnt++) : item.id;

			if (!this.items[id])
				this.items[id] = new CatalogMenuItem(item);

			return this.items[id];
		},

		itemOver : function(item)
		{
			var menuItem = this.getItem(item);
			if (!menuItem)
				return;

			if (this.outItem == menuItem)
			{
				clearTimeout(menuItem.timeoutOut);
			}

			this.overItem = menuItem;

			if (menuItem.timeoutOver)
			{
				clearTimeout(menuItem.timeoutOver);
			}

			menuItem.timeoutOver = setTimeout(function() {
				if (BX.CatalogMenu.overItem == menuItem)
				{
					menuItem.itemOver();
				}

			}, 100);
		},

		itemOut : function(item)
		{
			var menuItem = this.getItem(item);
			if (!menuItem)
				return;

			this.outItem = menuItem;

			if (menuItem.timeoutOut)
			{
				clearTimeout(menuItem.timeoutOut);
			}

			menuItem.timeoutOut = setTimeout(function() {

				if (menuItem != BX.CatalogMenu.overItem)
				{
					menuItem.itemOut();
				}
				if (menuItem == BX.CatalogMenu.outItem)
				{
					menuItem.itemOut();
				}

			}, 100);
		}
	};

	var CatalogMenuItem = function(item)
	{
		this.element = item;
		this.popup = BX.findChild(item, { className: "bx_children_container" }, false, false);
		this.isLastItem = BX.lastChild(this.element.parentNode) == this.element;
	};

	CatalogMenuItem.prototype.itemOver = function()
	{
		if (!BX.hasClass(this.element, "hover"))
		{
			BX.addClass(this.element, "hover");
			this.alignPopup();
		}
	};

	CatalogMenuItem.prototype.itemOut = function()
	{
		BX.removeClass(this.element, "hover");
	};

	CatalogMenuItem.prototype.alignPopup = function()
	{
		if (!this.popup)
			return;

		this.popup.style.cssText = "";

		var ulContainer = this.element.parentNode;
		var offsetRightPopup = this.popup.offsetLeft + this.popup.offsetWidth;
		var offsetRightMenu = ulContainer.offsetLeft + ulContainer.offsetWidth;

		if (offsetRightPopup >= offsetRightMenu)
		{
			this.popup.style.right = /*this.isLastItem ? "0px" :*/ "0";
		}
	};
})(window);

BX.namespace("BX.Main.Menu");
BX.Main.Menu.CatalogHorizontal = (function()
{
	var CatalogHorizontal = function(menuBlockId)
	{
		this.catalogMenuFirstWidth = 0;
		this.menuBlockId = menuBlockId;
		this.catalogMenuFirstWidth = this.resizeMenu(this.menuBlockId) + 20;

		if (this.catalogMenuFirstWidth > 640)
			this.setAlign();
		else
			this.setPadding();

		this.resizeMenu();

		BX.bind(window, "resize", BX.proxy(this.resizeMenu, this));
	};

	CatalogHorizontal.prototype.resizeMenu = function()
	{
		var widthSum = 0; // sum of width for all li
		var wpa;

		var firstLevelLi = BX.findChildren(BX(this.menuBlockId), {className : "bx_hma_one_lvl"}, true);

		if (firstLevelLi)
		{
			for(var i = 0; i < firstLevelLi.length; i++)
			{
				wpa = BX.firstChild(firstLevelLi[i]).clientWidth;
				widthSum += wpa;
			}

			if((widthSum+20) <= this.catalogMenuFirstWidth)
				BX.addClass(BX(this.menuBlockId), "small");   //adaptive
			else
				BX.removeClass(BX(this.menuBlockId), "small");
		}

		return widthSum;
	};

	CatalogHorizontal.prototype.setAlign = function()
	{
		var firstLevelLi = BX.findChildren(BX(this.menuBlockId), {className : "bx_hma_one_lvl"}, true);
		var widthSum = 0;

		if (firstLevelLi)
		{
			for(var i = 0; i < firstLevelLi.length; i++)
			{
				firstLevelLi[i].removeAttribute("style");
				var wp = firstLevelLi[i].clientWidth;
				widthSum += wp;
			}

			var coefWidth = widthSum/100;

			var numFirstLevelLi = firstLevelLi.length;
			var percentWidth = 0;
			for(i = 0; i < numFirstLevelLi; i++)
			{
				wp = firstLevelLi[i].clientWidth/coefWidth;
				percentWidth += wp;
				if (i == numFirstLevelLi-1)
				{
					if (percentWidth > 100)
						wp -= percentWidth - 100;
					else if (percentWidth < 100)
						wp += 100 - percentWidth;
				}
				firstLevelLi[i].style.width = wp + "%";
			}
		}
	};

	CatalogHorizontal.prototype.setPadding = function()
	{
		var firstLevelLi = BX.findChildren(BX(this.menuBlockId), {className : "bx_hma_one_lvl"}, true);
		if (firstLevelLi)
		{
			for(var i = 0; i < firstLevelLi.length; i++)
			{
				BX.firstChild(firstLevelLi[i]).style.padding = "19px 10px";
			}
		}
	};

	CatalogHorizontal.prototype.changeSectionPicure = function(element)
	{
		var descrSpan = BX.nextSibling(element);
		var curDescr = descrSpan.innerHTML || '';
		if (descrSpan)
		{
			var curImgWrapObj = BX.nextSibling(descrSpan);
			var curImgObj = BX.clone(BX.firstChild(curImgWrapObj));
		}
		var parentObj = BX.hasClass(element, 'bx_hma_one_lvl') ? element : BX.findParent(element, {className:'bx_hma_one_lvl'});
		var sectionImgObj = BX.findChild(parentObj, {className:'bx_section_picture'}, true, false);
		sectionImgObj.innerHTML = "";
		if (curImgObj)
		{
			sectionImgObj.appendChild(curImgObj);
		}
		var sectionDescrObj = BX.findChild(parentObj, {className:'bx_section_description'}, true, false);
		sectionDescrObj.innerHTML = curDescr;
		BX.previousSibling(sectionDescrObj).innerHTML = element.innerHTML;
		sectionImgObj.parentNode.href = element.href;
	};

	return CatalogHorizontal;
})();




/* End */
;; /* /bitrix/templates/electroshop/components/bitrix/sale.basket.basket.line/template1/script.min.js?16153026853876*/
; /* /bitrix/templates/electroshop/components/bitrix/menu/menu_header_electro/script.js?16148745995632*/

//# sourceMappingURL=template_eb6fb359adcd2e5b2a593e73ba386ce6.map.js