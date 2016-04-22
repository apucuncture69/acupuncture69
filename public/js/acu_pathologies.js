$( document ).ready(function() {

	$('#pathologies_content').html('<tr><td colspan="4">'+$('#loading').html()+'</td></tr>');

	$.ajax({
	    url: 'templating',
	    type: 'POST',
	    data: {
	    	method: 'GET',
	    	url: 'api/filtres',
	    	tpl: 'acu_pathologies_filter'
	    },
	    success: function(data) {
	    	$('#pathologies_filter').html(data);


			$('#meridiens').change(function(){
				maj();
			});

			$('#types').change(function(){
				maj();
			});
	    },
	    error: function(result) {
	        alert('mince');
	    }
	});

	$.ajax({
	    url: 'templating',
	    type: 'POST',
	    data: {
	    	method: 'GET',
	    	url: 'api/pathologies',
	    	tpl: 'acu_pathologies_data'
	    },
	    success: function(data) {
	    	$('#pathologies_content').html(data);
	    },
	    error: function(result) {
	        alert('mince');
	    }
	});

	$('#patho_button_search').click(function(){
    	document.location.href="login-pathologies";
	});

	$('.acu_search_btn').click(function(){
		if($('#search').val()!=''){
			var keyword_html = 	 '<div class="keyword" value="'+$('#search').val()+'">'
								+'<div class="keyword_txt">'
								+$('#search').val()
								+'</div>'
								+'<div class="keyword_btn"></div>'
								+'</div>';

	    	$('#words').append(keyword_html);
	    	$('#search').val('');
	    	maj();
	    } else {
	    	$('#search').focus();
	    }
	});

	$('#search').keypress(function (e) {
		var key = e.which;
		if(key == 13) {
			$('.acu_search_btn').click();
		}
	});
});

function addCloseAction(){
	$('.keyword_btn').each(function(){
		$(this).click(function(){
	    	$(this).parent().remove();
	    	maj();
    	});
	});
}

function maj(){
	$('#pathologies_content').html('<tr><td colspan="4">'+$('#loading').html()+'</td></tr>');
	addCloseAction();

	var filters = '?';
	var keywords = '';
	if($('#meridiens').val()!='all'){
		filters=filters+'&meridien='+encodeURIComponent($('#meridiens').val());
	}

	if($('#types').val()!='all'){
		filters=filters+'&type='+encodeURIComponent($('#types').val());
	}

	$('.keyword_txt').each(function(){
		keywords = keywords+$(this).text()+' ';
	});

	if(keywords!=''){
		filters=filters+'&keywords='+encodeURIComponent(keywords);
	}


	$.ajax({
	    url: 'templating',
	    type: 'POST',
	    data: {
	    	method: 'GET',
	    	url: 'api/pathologies',
	    	tpl: 'acu_pathologies_data',
	    	filters: filters
	    },
	    success: function(data) {
	    	$('#pathologies_content').html(data);
	    },
	    error: function(result) {
	        alert('mince');
	    }
	});
}
