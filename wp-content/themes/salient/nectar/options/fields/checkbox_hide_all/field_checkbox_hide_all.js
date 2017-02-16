jQuery(document).ready(function(){
	
	setTimeout(checkCustomFonts,180);
	
	function checkCustomFonts(){
		jQuery('.redux-opts-checkbox-hide-all').each(function(){
			if(!jQuery(this).is(':checked')){
				jQuery(this).closest('table').nextAll('table').css({'opacity': 0.25});
			}
		});
	}

	
	jQuery('.redux-opts-checkbox-hide-all').live('click',function(){
		
			if(!jQuery(this).is(':checked')){
				jQuery(this).closest('table').nextAll('table').stop().animate({'opacity': 0.25});
			}
			else {
				jQuery(this).closest('table').nextAll('table').stop().animate({'opacity': 1});
			}
	});
	
});
