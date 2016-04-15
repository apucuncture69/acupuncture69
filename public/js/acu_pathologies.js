
$( document ).ready(function() {

	$.ajax({
	    url: 'templating',
	    type: 'POST',
	    data: {
	    	method: 'GET',
	    	url: 'api/pathologies',
	    	tpl: 'acu_pathologies_data'
	    },
	    success: function(data) {
	    	//alert(data);
	    	$('#pathologies_content').html(data);
	    },
	    error: function(result) {
	        alert('mince');
	    }
	});

	$('#patho_button_search').click(function(){
    		document.location.href="login-pathologies";
	});

});
