$( document ).ready(function() {
	if($('#header_deco').length){
	    $("#header_deco").click(function(){
			$.ajax({
			    url: 'api/user',
			    type: 'DELETE',
			    success: function(result) {
			        if(result==true){
			        	document.location.href="home";
			        }
			    },
			    error: function(result) {
			        alert('mince');
			    }
			});
		});
	}
});
