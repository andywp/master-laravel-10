
"use strict"

var dlabSettingsOptions = {};

function getUrlParams(dParam) 
	{
		var dPageURL = window.location.search.substring(1),
			dURLVariables = dPageURL.split('&'),
			dParameterName,
			i;

		for (i = 0; i < dURLVariables.length; i++) {
			dParameterName = dURLVariables[i].split('=');

			if (dParameterName[0] === dParam) {
				return dParameterName[1] === undefined ? true : decodeURIComponent(dParameterName[1]);
			}
		}
	}

(function($) {
	
	"use strict"
	
	/* var direction =  getUrlParams('dir');
	
	if(direction == 'rtl')
	{
        direction = 'rtl'; 
    }else{
        direction = 'ltr'; 
    } */
	
	dlabSettingsOptions = {
			typography: "Open Sans",
			version: "light",
			layout: "vertical",
			primary: "color_1",
			headerBg: "color_1",
			navheaderBg: "color_1",
			sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "full",
		};

	var dlabThemeSet4 = {
		typography: "Open Sans",
		version: "light",
		layout: "vertical",
		primary: "color_4",
		headerBg: "color_1",
		navheaderBg: "color_4",
		sidebarBg: "color_4",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "wide-box",
	};

	/* var dlabThemeSet6 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_5",
		headerBg: "color_1",
		navheaderBg: "color_5",
		sidebarBg: "color_5",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	}; */

	/* var dlabThemeSet3 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_14",
		headerBg: "color_14",
		navheaderBg: "color_1",
		sidebarBg: "color_1",
		sidebarStyle: "modern",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	}; */
	
	dlabSettingsOptions = dlabThemeSet4;
	
	new dlabSettings(dlabSettingsOptions); 

	jQuery(window).on('resize',function(){
        /*Check container layout on resize */
		///alert(dlabSettingsOptions.primary);
        dlabSettingsOptions.containerLayout = $('#container_layout').val();
        /*Check container layout on resize END */
        
		new dlabSettings(dlabSettingsOptions); 
	});
	
})(jQuery);