$( document ).ready(function() {

	$('.acu_infos_profile').each(function( index ) {
		var img = $(this).children( 'div.acu_infos_img' );
		var txt = $(this).children( 'div.acu_infos_txt' ).children( 'p:first' );
		img.hover(
			function(){
				txt.removeClass( 'acu_infos_userinfos' );
				txt.addClass( 'acu_infos_userinfos_hover' );
			},
			function(){
				txt.addClass( 'acu_infos_userinfos' );
				txt.removeClass( 'acu_infos_userinfos_hover' );
			}
		);
	});

	$('.acu_infos_txt').each(function( index ) {
		var txt = $(this).children( 'p:first' );
		$(this).hover(
			function(){
				txt.removeClass( 'acu_infos_userinfos' );
				txt.addClass( 'acu_infos_userinfos_hover' );
			},
			function(){
				txt.addClass( 'acu_infos_userinfos' );
				txt.removeClass( 'acu_infos_userinfos_hover' );
			}
		);
	});

});
