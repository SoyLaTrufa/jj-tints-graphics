/**
 * --------------------------------------------------------------------
 * jQuery accessible tabs plugin
 * Author: Scott Jehl, scott@filamentgroup.com
 * Copyright (c) 2009 Filament Group 
 * licensed under MIT (filamentgroup.com/examples/mit-license.txt)
 * --------------------------------------------------------------------
 */
jQuery.fn.tabs = function(settings){
	//configurable options
	var o = $.extend({
		updateHash: false,
		autoRotate: false,
		alwaysScrollToTop: true
	},settings);
	
	return $(this).each(function(){
		//reference to tabs container
		var tabs = $(this);

		//maybe set ARIA app mode depending on use case
		/*
		if( !$('body').is('[role]') ){ 
			$('body').attr('role','application');
		}
		*/
		
		//nav is first ul
		var tabsNav = tabs.find('nav'); 
		
		var tabsBody = tabs.find('.tab-container');
		
		var tabIDprefix = 'tab-';

		var tabIDsuffix = '-enhanced';
		
		//add class to nav, tab body
		tabsNav
			.addClass('tabs-nav')
			.attr('role','tablist');
			
		tabsBody
			.addClass('tabs-body');
		
		//find tab panels, add class and aria
		tabsBody.find('.tab-content').each(function(){
			$(this)
				.addClass('tabs-panel')
				.attr('role','tabpanel')
				.attr('aria-hidden', true)
				.attr('aria-labelledby', tabIDprefix + $(this).attr('id'))
				.attr('id', $(this).attr('id') + tabIDsuffix);
		});
		
		//set role of each tab
		tabsNav.find('a').each(function(){
			$(this)
				.attr('role','tab')
				.attr('id', tabIDprefix+$(this).attr('href').split('#')[1]);
		});

		//switch selected on click
		tabsNav.find('a').attr('tabindex','-1');
		
		//generic select tab function
		function selectTab(tab,fromHashChange){	
				//unselect tabs
				tabsNav.find('a.tabs-selected')
					.removeClass('tabs-selected').attr('tabindex','-1');
				//set selected tab item	
				tab.attr('tabindex','0').addClass('tabs-selected');
				if(! o.autoRotate){
					tab.focus();
				}
				//unselect  panels
				tabsBody.find('div.tabs-panel-selected').attr('aria-hidden',true).removeClass('tabs-panel-selected');
				//select active panel
				$( tab.attr('href') + tabIDsuffix ).addClass('tabs-panel-selected').attr('aria-hidden',false);
				
				//update hash if option is true
				if( o.updateHash ){
					location.hash = tab.attr('href');
				}
		}

			
		tabsNav.find('a')
			.click(function( e ){
				selectTab($(this));
				e.preventDefault();
			})
			.keydown(function(event){
				var currentTab = $(this).parent();
				var ret = true;
				switch(event.keyCode){
					case 37://left
					case 38://up
						if(currentTab.prev().size() > 0){
							selectTab(currentTab.prev().find('a'));
							currentTab.prev().find('a').eq(0).focus();
							ret = false;
						}
					break;
					case 39: //right
					case 40://down
						if(currentTab.next().size() > 0){
							selectTab(currentTab.next().find('a'));
							currentTab.next().find('a').eq(0).focus();
							ret = false;
						}
					break;
					case 36: //home key
						selectTab(tabsNav.find('li:first a'));
						tabsNav.find('li:first a').eq(0).focus();
						ret = false;
					break;
					case 35://end key
						selectTab(tabsNav.find('li:last a'));
						tabsNav.find('li:last a').eq(0).focus();
						ret = false;
					break;
				}
				return ret;
			});
			
		//if tabs are rotating, stop them upon user events	
		tabs.bind('click keydown focus',function(){
			if(o.autoRotate){
				clearInterval(tabRotator);
			}
		});
		
		//function to select a tab from the url hash
		function selectTabFromHash(hash){
			var currHash = hash || window.location.hash;
			var hashedTab = tabsNav.find('a[href="#'+ currHash.replace('#','') +'"]');
		    if( hashedTab.size() > 0){
		    	selectTab(hashedTab,true);	
		    }
		    else {
		    	selectTab( tabsNav.find('a:first'),true);
		    }
		    //return true/false
		    return !!hashedTab.size();
		}
		
		
		//set tab from hash at page load, if no tab hash, select first tab
		selectTabFromHash(null,true);
		
		//support hashchange event if available for backbutton, history, etc
		if( o.updateHash ){
			$(window).bind("hashchange", function(){
				var newHash = location.hash;
				selectTabFromHash(newHash,true);
				
			});
		}

		//auto rotate tabs
		if(o.autoRotate){
			var tabRotator = setInterval(function(){
				var currentTabLI = tabsNav.find('.tabs-selected');
				var nextTab = currentTabLI.next();
				if(nextTab.length){
					selectTab(nextTab,false );
				}
				else{
					selectTab( tabsNav.find('a:first'),false );
				}
			}, o.autoRotate);
		}
		
		if(o.alwaysScrollToTop){
			$(window)[0].scrollTo(0,0);
		}

	});
};

//funci??n para destruir las tabs
jQuery.fn.destroyTabs = function(){
			
	//reference to tabs container
	var tabs = $(this);

	//nav is first ul
	var tabsNav = tabs.find('nav'); 
	
	var tabsBody = tabs.find('.tab-container');
	
	var tabIDprefix = 'tab-';

	var tabIDsuffix = '-enhanced';
	
	//add class to nav, tab body
	tabsNav
		.removeClass('tabs-nav')
		.removeAttr('role');
		
	tabsBody
		.removeClass('tabs-body');
	
	//find tab panels, add class and aria
	tabsBody.find('.tab-content').each(function(){
		$(this)
			.removeClass('tabs-panel')
			.removeAttr('role')
			.removeAttr('aria-hidden')
			.removeAttr('aria-labelledby')
			.attr('id', $(this).attr('id').replace(tabIDsuffix,''));
	});
	
	//set role of each tab
	tabsNav.find('a').each(function(){
		$(this)
			.removeAttr('role')
			.removeAttr('id');
	});

	//switch selected on click
	tabsNav.find('a').removeAttr('tabindex','-1');

	//unselect tabs
	tabsNav.find('a.tabs-selected')
		.removeClass('tabs-selected').removeAttr('tabindex');

	//unselect  panels
	tabsBody.find('div.tabs-panel-selected').removeAttr('aria-hidden').removeClass('tabs-panel-selected');

	tabs.off('click keydown focus');		

};